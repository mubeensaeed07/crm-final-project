@extends('layouts.master')

@section('title') User Profile @endsection

@section('styles')
<style>
    .profile-header {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 2rem 0;
        margin-bottom: 2rem;
    }
    .profile-avatar {
        width: 120px;
        height: 120px;
        border-radius: 50%;
        border: 4px solid white;
        object-fit: cover;
    }
    .section-title {
        color: #495057;
        font-weight: 600;
        margin-bottom: 1.5rem;
        padding-bottom: 0.5rem;
        border-bottom: 2px solid #e9ecef;
    }
    .permissions-grid {
        max-height: 300px;
        overflow-y: auto;
    }
    .permission-item {
        font-size: 0.9rem;
        padding: 0.25rem 0;
    }
    .permission-item i {
        width: 16px;
        text-align: center;
    }
</style>
@endsection

@section('content')

<div class="container-fluid">
    <!-- Profile Header -->
    <div class="row">
        <div class="col-12">
            <div class="profile-header">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <div class="col-auto">
                            <div class="position-relative d-inline-block">
                            @if($user->userInfo && $user->userInfo->avatar)
                                    <img id="header-avatar" src="{{ asset('storage/' . $user->userInfo->avatar) }}" alt="Profile" class="profile-avatar">
                            @else
                                    <div id="header-avatar" class="profile-avatar bg-white d-flex align-items-center justify-content-center">
                                    <i class="ti ti-user fs-48 text-primary"></i>
                                </div>
                            @endif
                                <!-- Camera Button Overlay -->
                                <button type="button" class="btn btn-primary btn-sm position-absolute bottom-0 end-0 rounded-circle" onclick="document.getElementById('avatar-input').click()" style="width: 40px; height: 40px; padding: 0; border: 3px solid white; box-shadow: 0 2px 8px rgba(0,0,0,0.3); z-index: 10;">
                                    <i class="ti ti-camera fs-16"></i>
                                </button>
                            </div>
                        </div>
                        <div class="col">
                            <h2 class="mb-1">{{ $user->full_name }}</h2>
                            <p class="mb-1 opacity-75">{{ $user->email }}</p>
                            @php
                                $userType = $user->userInfo && $user->userInfo->userType ? $user->userInfo->userType : null;
                            @endphp
                            @if($userType)
                                <span class="badge bg-light text-dark fs-12">{{ $userType->name }}</span>
                            @endif
                            @if($user->userInfo && $user->userInfo->job_title)
                                <p class="mb-0 opacity-75">{{ $user->userInfo->job_title }} @ {{ $user->userInfo->company }}</p>
                            @endif
                        </div>
                        <div class="col-auto">
                            <button class="btn btn-light" onclick="editProfile()">
                                <i class="ti ti-edit me-1"></i>Edit Profile
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Profile Form -->
    <div class="row">
        <div class="col-xl-12">
            <div class="card custom-card">
                <div class="card-header">
                    <div class="card-title">Complete Your Profile</div>
                    <p class="text-muted mb-0">Fill in all the details to complete your profile</p>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('user.profile.update') }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        <!-- Hidden file input for avatar -->
                        <input type="file" class="d-none" name="avatar" id="avatar-input" accept="image/*" onchange="previewImage(this)">

                        <!-- Personal Information -->
                        <div class="row mb-4">
                            <div class="col-12">
                                <h5 class="section-title">Personal Information</h5>
                                @if($user->isUser())
                                    <div class="alert alert-info">
                                        <i class="ti ti-info-circle me-2"></i>
                                        <strong>Note:</strong> As a regular user, you can only edit your profile picture and password. Contact your administrator to update other information.
                                    </div>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">First Name <span class="text-danger">*</span></label>
                                    @if($user->isUser())
                                        <input type="text" class="form-control" value="{{ $user->first_name }}" readonly style="background-color: #f8f9fa;">
                                        <small class="text-muted">Contact administrator to change</small>
                                    @else
                                    <input type="text" class="form-control" name="first_name" value="{{ old('first_name', $user->first_name) }}" required>
                                    @endif
                                    @error('first_name')
                                        <div class="text-danger fs-12">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Last Name <span class="text-danger">*</span></label>
                                    @if($user->isUser())
                                        <input type="text" class="form-control" value="{{ $user->last_name }}" readonly style="background-color: #f8f9fa;">
                                        <small class="text-muted">Contact administrator to change</small>
                                    @else
                                    <input type="text" class="form-control" name="last_name" value="{{ old('last_name', $user->last_name) }}" required>
                                    @endif
                                    @error('last_name')
                                        <div class="text-danger fs-12">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Email <span class="text-danger">*</span></label>
                                    @if($user->isUser())
                                        <input type="email" class="form-control" value="{{ $user->email }}" readonly style="background-color: #f8f9fa;">
                                        <small class="text-muted">Contact administrator to change</small>
                                    @else
                                    <input type="email" class="form-control" name="email" value="{{ old('email', $user->email) }}" required>
                                    @endif
                                    @error('email')
                                        <div class="text-danger fs-12">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Phone Number</label>
                                    @if($user->isUser())
                                        <input type="tel" class="form-control" value="{{ $user->userInfo->phone ?? 'Not provided' }}" readonly style="background-color: #f8f9fa;">
                                        <small class="text-muted">Contact administrator to change</small>
                                    @else
                                    <input type="tel" class="form-control" name="phone" value="{{ old('phone', $user->userInfo->phone ?? '') }}">
                                    @endif
                                    @error('phone')
                                        <div class="text-danger fs-12">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Address Information -->
                        <div class="row mb-4">
                            <div class="col-12">
                                <h5 class="section-title">Address Information</h5>
                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <label class="form-label">Address</label>
                                    @if($user->isUser())
                                        <textarea class="form-control" rows="3" readonly style="background-color: #f8f9fa;">{{ $user->userInfo->address ?? 'Not provided' }}</textarea>
                                        <small class="text-muted">Contact administrator to change</small>
                                    @else
                                    <textarea class="form-control" name="address" rows="3" placeholder="Enter your full address">{{ old('address', $user->userInfo->address ?? '') }}</textarea>
                                    @endif
                                    @error('address')
                                        <div class="text-danger fs-12">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">City</label>
                                    @if($user->isUser())
                                        <input type="text" class="form-control" value="{{ $user->userInfo->city ?? 'Not provided' }}" readonly style="background-color: #f8f9fa;">
                                        <small class="text-muted">Contact administrator to change</small>
                                    @else
                                    <input type="text" class="form-control" name="city" value="{{ old('city', $user->userInfo->city ?? '') }}">
                                    @endif
                                    @error('city')
                                        <div class="text-danger fs-12">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Professional Information -->
                        <div class="row mb-4">
                            <div class="col-12">
                                <h5 class="section-title">Professional Information</h5>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Company</label>
                                    @if($user->isUser())
                                        <input type="text" class="form-control" value="{{ $user->userInfo->company ?? 'Not provided' }}" readonly style="background-color: #f8f9fa;">
                                        <small class="text-muted">Contact administrator to change</small>
                                    @else
                                    <input type="text" class="form-control" name="company" value="{{ old('company', $user->userInfo->company ?? '') }}">
                                    @endif
                                    @error('company')
                                        <div class="text-danger fs-12">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <label class="form-label">Bio</label>
                                    @if($user->isUser())
                                        <textarea class="form-control" rows="4" readonly style="background-color: #f8f9fa;">{{ $user->bio ?? 'Not provided' }}</textarea>
                                        <small class="text-muted">Contact administrator to change</small>
                                    @else
                                    <textarea class="form-control" name="bio" rows="4" placeholder="Tell us about yourself">{{ old('bio', $user->bio) }}</textarea>
                                    @endif
                                    @error('bio')
                                        <div class="text-danger fs-12">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>




                        <!-- Modules & Permissions Section -->
                        <div class="row mb-4">
                            <div class="col-12">
                                <h5 class="section-title">My Modules & Permissions</h5>
                                <p class="text-muted">View your assigned modules and permissions.</p>
                            </div>
                            <div class="col-12">
                                @php
                                    $userModules = $user->userModules()->with('module')->get();
                                @endphp
                                
                                
                                
                                
                                @if($userModules->count() > 0)
                                    <div class="row">
                                        @foreach($userModules as $userModule)
                                            <div class="col-md-6 col-lg-4 mb-3">
                                                <div class="card border">
                                                    <div class="card-header bg-primary text-white">
                                                        <h6 class="mb-0">
                                                            <i class="ti ti-package me-2"></i>
                                                            {{ $userModule->module->name }}
                                                        </h6>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="permissions-grid">
                                                            @php
                                                                // Only show permissions that are actually set (not default 0 values)
                                                                $permissionLabels = [
                                                                    'can_create_users' => 'Create Users',
                                                                    'can_edit_users' => 'Edit Users', 
                                                                    'can_delete_users' => 'Delete Users',
                                                                    'can_reset_passwords' => 'Reset Passwords',
                                                                    'can_assign_modules' => 'Assign Modules',
                                                                    'can_view_reports' => 'View Reports',
                                                                    'can_mark_salary_paid' => 'Mark Salary Paid',
                                                                    'can_mark_salary_pending' => 'Mark Salary Pending',
                                                                    'can_view_salary_data' => 'View Salary Data',
                                                                    'can_manage_salary_payments' => 'Manage Salary Payments',
                                                                    'can_access_user_support' => 'User Support Access',
                                                                    'can_access_dealer_support' => 'Dealer Support Access',
                                                                    'user_support_can_view' => 'User can view',
                                                                    'user_support_can_update' => 'User can update',
                                                                    'user_support_can_expiry_update' => 'User expiry update',
                                                                    'user_support_can_package_change' => 'User package change',
                                                                    'user_support_can_add_days' => 'User add days',
                                                                    'dealer_support_can_view' => 'Dealer can view',
                                                                    'dealer_support_can_update' => 'Dealer can update',
                                                                    'dealer_support_can_expiry_update' => 'Dealer expiry update',
                                                                    'dealer_support_can_package_change' => 'Dealer package change',
                                                                    'dealer_support_can_add_days' => 'Dealer add days'
                                                                ];
                                                                
                                                                $hasPermissions = false;
                                                            @endphp
                                                            
                                                            @foreach($permissionLabels as $permission => $label)
                                                                @if(isset($userModule->$permission) && $userModule->$permission == 1)
                                                                    @php $hasPermissions = true; @endphp
                                                                    <div class="permission-item d-flex align-items-center mb-2">
                                                                        <i class="ti ti-check-circle text-success me-2"></i>
                                                                        <span class="text-success">{{ $label }}</span>
                                                                    </div>
                                                                @endif
                                                            @endforeach
                                                            
                                                            @if(!$hasPermissions)
                                                                <div class="text-muted text-center py-3">
                                                                    <i class="ti ti-info-circle me-2"></i>
                                                                    No specific permissions set for this module
                                                                </div>
                                                            @endif
                                </div>
                            </div>
                                </div>
                            </div>
                                        @endforeach
                                    </div>
                                @else
                                    <div class="alert alert-info">
                                        <i class="ti ti-info-circle me-2"></i>
                                        No modules assigned yet. Contact your administrator to get module access.
                                </div>
                                @endif
                            </div>
                        </div>

                        <!-- Password Change Section -->
                        <div class="row mb-4">
                            <div class="col-12">
                                <h5 class="section-title">Change Password</h5>
                                <p class="text-muted">Leave password fields empty if you don't want to change your password.</p>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Current Password</label>
                                    <input type="password" class="form-control" name="current_password" placeholder="Enter your current password">
                                    @error('current_password')
                                        <div class="text-danger fs-12">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">New Password</label>
                                    <input type="password" class="form-control" name="new_password" placeholder="Enter new password">
                                    @error('new_password')
                                        <div class="text-danger fs-12">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Confirm New Password</label>
                                    <input type="password" class="form-control" name="new_password_confirmation" placeholder="Confirm new password">
                                    @error('new_password_confirmation')
                                        <div class="text-danger fs-12">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="row">
                            <div class="col-12">
                                <div class="d-flex justify-content-end gap-2">
                                    <a href="{{ route('user.dashboard') }}" class="btn btn-light">Cancel</a>
                                    <button type="submit" class="btn btn-primary">
                                        <i class="ti ti-device-floppy me-1"></i>Save Profile
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
function editProfile() {
    // Scroll to the form
    document.querySelector('form').scrollIntoView({ behavior: 'smooth' });
}

function previewImage(input) {
    if (input.files && input.files[0]) {
        const file = input.files[0];
        
        // Validate file size (2MB max)
        if (file.size > 2 * 1024 * 1024) {
            alert('File size must be less than 2MB');
            input.value = '';
            return;
        }
        
        // Validate file type
        if (!file.type.startsWith('image/')) {
            alert('Please select a valid image file');
            input.value = '';
            return;
        }
        
        const reader = new FileReader();
        reader.onload = function(e) {
            // Update header avatar
            const headerAvatar = document.getElementById('header-avatar');
            if (headerAvatar.tagName === 'IMG') {
                headerAvatar.src = e.target.result;
            } else {
                // Replace the div with an img
                const newImg = document.createElement('img');
                newImg.id = 'header-avatar';
                newImg.src = e.target.result;
                newImg.alt = 'Profile';
                newImg.className = 'profile-avatar';
                newImg.style.cssText = 'width: 120px; height: 120px; border-radius: 50%; border: 4px solid white; object-fit: cover;';
                headerAvatar.parentNode.replaceChild(newImg, headerAvatar);
            }
        };
        reader.readAsDataURL(file);
    }
}


</script>
@endsection
