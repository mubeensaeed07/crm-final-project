<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Log;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LogsController extends Controller
{
    /**
     * Display logs for admin (all users and supervisors under them)
     */
    public function adminLogs(Request $request)
    {
        $user = Auth::user();
        
        if (!$user->isAdmin()) {
            return redirect()->back()->with('error', 'Access denied.');
        }

        $query = Log::with(['user', 'supervisor'])
            ->forAdmin($user->id)
            ->orderBy('created_on', 'desc');

        // Search functionality
        if ($request->filled('search')) {
            $query->search($request->search);
        }

        $logs = $query->paginate(20);

        return view('admin.logs', compact('logs'));
    }

    /**
     * Display logs for supervisor (their own logs)
     */
    public function supervisorLogs(Request $request)
    {
        $supervisor = Auth::guard('supervisor')->user();
        
        if (!$supervisor) {
            return redirect()->back()->with('error', 'Access denied.');
        }

        $query = Log::with(['user', 'supervisor'])
            ->where('user_type', 'supervisor')
            ->where('supervisor_id', $supervisor->id)
            ->orderBy('created_on', 'desc');

        // Search functionality
        if ($request->filled('search')) {
            $query->search($request->search);
        }

        $logs = $query->paginate(20);

        return view('supervisor.logs', compact('logs'));
    }

    /**
     * Display logs for regular user (their own logs)
     */
    public function userLogs(Request $request)
    {
        $user = Auth::user();
        
        if ($user->isAdmin() || $user->isSupervisor()) {
            return redirect()->back()->with('error', 'Access denied.');
        }

        $query = Log::with(['user', 'supervisor'])
            ->where('user_type', 'user')
            ->where('user_id', $user->id)
            ->orderBy('created_on', 'desc');

        // Search functionality
        if ($request->filled('search')) {
            $query->search($request->search);
        }

        $logs = $query->paginate(20);

        return view('user.logs', compact('logs'));
    }

    /**
     * Get logs data for AJAX requests
     */
    public function getLogsData(Request $request)
    {
        $user = Auth::user();
        $query = Log::with('user');

        // Determine access level
        if ($user->isAdmin()) {
            $query->forAdmin($user->id);
        } else {
            $query->forUser($user->id);
        }

        // Search functionality
        if ($request->filled('search')) {
            $query->search($request->search);
        }

        // Filter by date range if provided
        if ($request->filled('date_from')) {
            $query->where('created_on', '>=', $request->date_from);
        }
        if ($request->filled('date_to')) {
            $query->where('created_on', '<=', $request->date_to);
        }

        // Filter by type if provided
        if ($request->filled('type')) {
            $query->where('type', $request->type);
        }

        // Filter by module if provided
        if ($request->filled('module')) {
            $query->where('module', $request->module);
        }

        $logs = $query->orderBy('created_on', 'desc')->paginate(20);

        return response()->json([
            'logs' => $logs,
            'success' => true
        ]);
    }
}