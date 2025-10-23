<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserInfo;
use App\Models\Module;
use App\Models\UserModule;
use App\Models\UserType;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Mail\UserRegisteredMail;
use App\Mail\PasswordResetMail;

class AdminController extends Controller
{
    public function dashboard()
    {
        $user = Auth::user();
        $user->load('userInfo.userType');
        return view('admin.dashboard', compact('user'));
    }

    public function users()
    {
        // Only show users that belong to the current admin
        $users = User::where('role_id', 3)
                    ->where('admin_id', auth()->id())
                    ->with(['userInfo.userType', 'userModules.module'])
                    ->get();
        // Only show HRM and SUPPORT modules for now - COMMENTED OUT FINANCE and REPORTS
        $modules = Module::whereIn('name', ['HRM', 'SUPPORT'])->get();
        // Only show "User" type for user creation
        $userTypes = UserType::where('name', 'User')->get();
        
        // Get departments for the current admin
        $departments = \App\Models\Department::where('admin_id', auth()->id())
            ->where('is_active', true)
            ->orderBy('name')
            ->get();
        
        $userModules = UserModule::with(['user', 'module'])
                    ->whereHas('user', function($query) {
                        $query->where('admin_id', auth()->id());
                    })
                    ->get();
        
        // Get current admin's company name
        $admin = auth()->user();
        
        return view('admin.users', compact('users', 'modules', 'userTypes', 'userModules', 'departments', 'admin'));
    }

    public function modules()
    {
        // Only show HRM and SUPPORT modules for now - COMMENTED OUT FINANCE and REPORTS
        $modules = Module::whereIn('name', ['HRM', 'SUPPORT'])->get();
        return view('admin.modules', compact('modules'));
    }

    public function settings()
    {
        return view('admin.settings');
    }

    public function profile()
    {
        $user = Auth::user();
        $user->load('userInfo');
        
        // Ensure user has a userInfo record
        if (!$user->userInfo) {
            $user->userInfo()->create([
                'phone' => null,
                'address' => null,
                'city' => null,
                'avatar' => null,
                'bio' => null,
                'linkedin_url' => null,
                'website_url' => null,
                'emergency_contact_name' => null,
                'emergency_contact_phone' => null,
                'emergency_contact_relationship' => null,
                'timezone' => null,
                'language' => null,
                'email_notifications' => true,
                'sms_notifications' => true,
            ]);
            $user->load('userInfo');
        }
        
        return view('admin.profile', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();
        
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'phone' => 'nullable|string|max:20',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'address' => 'nullable|string|max:500',
            'city' => 'nullable|string|max:100',
            'linkedin_url' => 'nullable|url|max:255',
            'website_url' => 'nullable|url|max:255',
            'emergency_contact_name' => 'nullable|string|max:100',
            'emergency_contact_phone' => 'nullable|string|max:20',
            'emergency_contact_relationship' => 'nullable|string|max:50',
            'timezone' => 'nullable|string|max:50',
            'language' => 'nullable|string|max:10',
            'email_notifications' => 'boolean',
            'sms_notifications' => 'boolean',
            // Company fields
            'company_name' => 'nullable|string|max:255',
            'company_location' => 'nullable|string|max:255',
            'company_ntn_number' => 'nullable|string|max:50',
            'company_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'company_print_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'company_bio' => 'nullable|string|max:1000',
            'company_country' => 'nullable|string|max:100',
            // Password change validation
            'current_password' => 'nullable|required_with:new_password',
            'new_password' => 'nullable|min:8|confirmed',
            'new_password_confirmation' => 'nullable|required_with:new_password',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Handle password change
        if ($request->filled('new_password')) {
            if (!Hash::check($request->current_password, $user->password)) {
                return redirect()->back()
                    ->withErrors(['current_password' => 'Current password is incorrect'])
                    ->withInput();
            }
            $user->password = Hash::make($request->new_password);
        }

        $data = $request->only([
            'phone', 'address', 'city', 'linkedin_url', 'website_url', 
            'emergency_contact_name', 'emergency_contact_phone',
            'emergency_contact_relationship', 'timezone', 'language', 'company_name',
            'company_location', 'company_ntn_number', 'company_bio', 'company_country'
        ]);
        
        // Handle avatar upload
        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            
            // Validate file size (2MB max)
            if ($avatar->getSize() > 2 * 1024 * 1024) {
                return redirect()->back()
                    ->withErrors(['avatar' => 'File size must be less than 2MB'])
                    ->withInput();
            }
            
            // Validate file type
            $allowedTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
            if (!in_array($avatar->getMimeType(), $allowedTypes)) {
                return redirect()->back()
                    ->withErrors(['avatar' => 'Only JPG, PNG, GIF, and WebP images are allowed'])
                    ->withInput();
            }
            
            // Delete old avatar if exists
            if ($user->userInfo && $user->userInfo->avatar) {
                $oldAvatarPath = storage_path('app/public/' . $user->userInfo->avatar);
                if (file_exists($oldAvatarPath)) {
                    unlink($oldAvatarPath);
                }
            }
            
            // Generate unique filename
            $avatarName = 'admin_' . $user->id . '_' . time() . '.' . $avatar->getClientOriginalExtension();
            $avatar->storeAs('public/avatars', $avatarName);
            $data['avatar'] = 'avatars/' . $avatarName;
        }

        // Handle company logo upload
        if ($request->hasFile('company_logo')) {
            $companyLogo = $request->file('company_logo');
            
            // Validate file size (2MB max)
            if ($companyLogo->getSize() > 2 * 1024 * 1024) {
                return redirect()->back()
                    ->withErrors(['company_logo' => 'Company logo file size must be less than 2MB'])
                    ->withInput();
            }
            
            // Validate file type
            $allowedTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
            if (!in_array($companyLogo->getMimeType(), $allowedTypes)) {
                return redirect()->back()
                    ->withErrors(['company_logo' => 'Only JPG, PNG, GIF, and WebP images are allowed'])
                    ->withInput();
            }
            
            // Delete old company logo if exists
            if ($user->company_logo) {
                $oldLogoPath = storage_path('app/public/' . $user->company_logo);
                if (file_exists($oldLogoPath)) {
                    unlink($oldLogoPath);
                }
            }
            
            // Generate unique filename
            $logoName = 'company_logo_' . $user->id . '_' . time() . '.' . $companyLogo->getClientOriginalExtension();
            $companyLogo->storeAs('public/company_logos', $logoName);
            $data['company_logo'] = 'company_logos/' . $logoName;
        }

        // Handle company print logo upload
        if ($request->hasFile('company_print_logo')) {
            $companyPrintLogo = $request->file('company_print_logo');
            
            // Validate file size (2MB max)
            if ($companyPrintLogo->getSize() > 2 * 1024 * 1024) {
                return redirect()->back()
                    ->withErrors(['company_print_logo' => 'Company print logo file size must be less than 2MB'])
                    ->withInput();
            }
            
            // Validate file type
            $allowedTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
            if (!in_array($companyPrintLogo->getMimeType(), $allowedTypes)) {
                return redirect()->back()
                    ->withErrors(['company_print_logo' => 'Only JPG, PNG, GIF, and WebP images are allowed'])
                    ->withInput();
            }
            
            // Delete old company print logo if exists
            if ($user->company_print_logo) {
                $oldPrintLogoPath = storage_path('app/public/' . $user->company_print_logo);
                if (file_exists($oldPrintLogoPath)) {
                    unlink($oldPrintLogoPath);
                }
            }
            
            // Generate unique filename
            $printLogoName = 'company_print_logo_' . $user->id . '_' . time() . '.' . $companyPrintLogo->getClientOriginalExtension();
            $companyPrintLogo->storeAs('public/company_print_logos', $printLogoName);
            $data['company_print_logo'] = 'company_print_logos/' . $printLogoName;
        }
        
        // Handle boolean fields
        $data['email_notifications'] = $request->has('email_notifications');
        $data['sms_notifications'] = $request->has('sms_notifications');
        
        // Update user basic info
        $user->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'company_name' => $data['company_name'],
            'company_location' => $data['company_location'],
            'company_ntn_number' => $data['company_ntn_number'],
            'company_bio' => $data['company_bio'],
            'company_country' => $data['company_country'],
            'company_logo' => $data['company_logo'] ?? $user->company_logo,
            'company_print_logo' => $data['company_print_logo'] ?? $user->company_print_logo,
        ]);

        // Update or create user info
        $userInfo = $user->userInfo;
        if (!$userInfo) {
            $userInfo = $user->userInfo()->create($data);
        } else {
            $userInfo->update($data);
        }

        // Log the profile update
        \App\Services\LoggingService::logProfileUpdate();

        return redirect()->back()->with('success', 'Profile updated successfully!');
    }

    public function addUser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'user_type' => 'required|exists:user_types,id',
            'salary' => 'nullable|numeric|min:0',
            'phone' => 'nullable|string|max:20',
            'cnic' => 'nullable|string|max:20',
            'joining_date' => 'nullable|date',
            'bank_account_title' => 'nullable|string|max:255',
            'bank_account_number' => 'nullable|string|max:50',
            'gender' => 'nullable|in:male,female,other',
            'address' => 'nullable|string|max:500',
            'city' => 'nullable|string|max:100',
            'job_title' => 'nullable|string|max:100',
            'department_id' => 'nullable|exists:departments,id',
            'company' => 'nullable|string|max:100',
            'modules' => 'required|array|min:1',
            'modules.*' => 'exists:modules,id'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Generate a random password
        $password = $this->generateRandomPassword();
        
        // Get the SuperAdmin ID - try multiple methods
        $currentAdmin = auth()->user();
        $superAdminId = null;
        
        // Method 1: Get from current admin's user_info
        if ($currentAdmin->userInfo && $currentAdmin->userInfo->superadmin_id) {
            $superAdminId = $currentAdmin->userInfo->superadmin_id;
        }
        // Method 2: If current admin is SuperAdmin (role_id = 1), use their own ID
        elseif ($currentAdmin->role_id == 1) {
            $superAdminId = $currentAdmin->id;
        }
        // Method 3: Find any SuperAdmin in the system
        else {
            $superAdmin = User::where('role_id', 1)->first();
            $superAdminId = $superAdmin ? $superAdmin->id : null;
        }
        
        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            // name field removed - using first_name and last_name separately
            'email' => $request->email,
            'role_id' => 3, // User role
            'admin_id' => auth()->id(), // Assign to current admin
            'superadmin_id' => $superAdminId, // Set superadmin_id in users table
            'is_approved' => true, // Admin-created users are automatically approved
            'password' => Hash::make($password),
            'salary' => $request->salary, // Add salary field
            'phone' => $request->phone, // Add phone field
            'created_by_type' => 'admin', // Admin is creating this user
            'created_by_id' => auth()->id() // Current admin's ID
        ]);
        
        // Create user info with hierarchy and user type
        $user->userInfo()->create([
            'admin_id' => auth()->id(), // Current admin is their admin
            'superadmin_id' => $superAdminId, // Same superadmin as the current admin
            'user_type_id' => $request->user_type, // User type assigned by admin
            'phone' => $request->phone,
            'cnic' => $request->cnic,
            'joining_date' => $request->joining_date,
            'bank_account_title' => $request->bank_account_title,
            'bank_account_number' => $request->bank_account_number,
            'gender' => $request->gender,
            'address' => $request->address,
            'city' => $request->city,
            'job_title' => $request->job_title,
            'department_id' => $request->department_id,
            'company' => $request->company
        ]);
        
        // Create user identification record
        DB::table('user_identification')->insert([
            'user_id' => $user->id,
            'admin_id' => auth()->id(),
            'superadmin_id' => $superAdminId,
            'user_role' => 'user',
            'status' => 'active',
            'approved_at' => now(),
            'assigned_at' => now(),
            'notes' => 'Created by admin: ' . auth()->user()->full_name,
            'created_at' => now(),
            'updated_at' => now()
        ]);


        // Assign modules to user
        foreach ($request->modules as $moduleId) {
            UserModule::create([
                'user_id' => $user->id,
                'module_id' => $moduleId
            ]);
        }

        // Send email notification to the new user
        try {
            Mail::to($user->email)->send(new UserRegisteredMail($user, $password, auth()->user()->full_name));
        } catch (\Exception $e) {
            // Log the error but don't fail the user creation
            \Log::error('Failed to send user registration email: ' . $e->getMessage());
        }

        // Log the user creation
        \App\Services\LoggingService::logUserCreation($user->full_name, 'User');

        return redirect()->back()->with('success', 'User added successfully! An email with login credentials has been sent to the user.');
    }

    public function showEditUser($id)
    {
        // Only allow editing users that belong to the current admin
        $user = User::where('id', $id)
                   ->where('admin_id', auth()->id())
                   ->firstOrFail();
        
        // Only show HRM and SUPPORT modules for now - COMMENTED OUT FINANCE and REPORTS
        $modules = Module::whereIn('name', ['HRM', 'SUPPORT'])->get();
        // Only show "User" type for user creation
        $userTypes = UserType::where('name', 'User')->get();
        
        // Get current user type from user_info
        $currentUserType = $user->userInfo ? $user->userInfo->user_type_id : null;
        
        // Get current user modules
        $userModuleIds = $user->userModules->pluck('module_id')->toArray();
        
        return view('admin.edit-user', compact('user', 'modules', 'userTypes', 'currentUserType', 'userModuleIds'));
    }

    public function editUser(Request $request, $id)
    {
        // Only allow editing users that belong to the current admin
        $user = User::where('id', $id)
                   ->where('admin_id', auth()->id())
                   ->firstOrFail();
        
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'user_type' => 'required|exists:user_types,id',
            'modules' => 'required|array|min:1',
            'modules.*' => 'exists:modules,id'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
        ]);

        // Update user type in user_info
        if ($user->userInfo) {
            $user->userInfo->update(['user_type_id' => $request->user_type]);
        } else {
            // Create user_info if it doesn't exist
            $user->userInfo()->create(['user_type_id' => $request->user_type]);
        }

        // Update user modules
        UserModule::where('user_id', $user->id)->delete();
        foreach ($request->modules as $moduleId) {
            UserModule::create([
                'user_id' => $user->id,
                'module_id' => $moduleId
            ]);
        }

        return redirect()->route('admin.dashboard')->with('success', 'User updated successfully!');
    }

    public function deleteUser($id)
    {
        // Only allow deleting users that belong to the current admin
        $user = User::where('id', $id)
                   ->where('admin_id', auth()->id())
                   ->firstOrFail();
        
        UserModule::where('user_id', $user->id)->delete();
        $user->delete();

        return redirect()->back()->with('success', 'User deleted successfully!');
    }

    public function getUsers()
    {
        // Only return users that belong to the current admin
        $users = User::where('role_id', 3)
                    ->where('admin_id', auth()->id())
                    ->with('userModules.module')
                    ->get();
        return response()->json($users);
    }

    public function resetUserPassword($id)
    {
        // Only allow resetting password for users that belong to the current admin
        $user = User::where('id', $id)
                   ->where('admin_id', auth()->id())
                   ->firstOrFail();
        
        // Generate a new random password
        $newPassword = $this->generateRandomPassword();
        
        // Update user password
        $user->update([
            'password' => Hash::make($newPassword)
        ]);

        // Send email notification to the user
        try {
            Mail::to($user->email)->send(new PasswordResetMail($user, $newPassword));
        } catch (\Exception $e) {
            \Log::error('Failed to send password reset email: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Password reset but failed to send email notification.');
        }

        return redirect()->back()->with('success', 'Password reset successfully! An email with new credentials has been sent to the user.');
    }

    private function generateRandomPassword($length = 12)
    {
        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*';
        $password = '';
        
        for ($i = 0; $i < $length; $i++) {
            $password .= $characters[rand(0, strlen($characters) - 1)];
        }
        
        return $password;
    }
}
