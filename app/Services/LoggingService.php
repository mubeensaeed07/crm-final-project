<?php

namespace App\Services;

use App\Models\Log;
use Illuminate\Support\Facades\Auth;

class LoggingService
{
    /**
     * Create a log entry
     */
    public static function createLog($type, $module = null, $description = null, $userId = null, $userType = null)
    {
        $userId = $userId ?? Auth::id();
        $userType = $userType ?? 'user';
        
        if (!$userId) {
            return false;
        }

        $logData = [
            'type' => $type,
            'module' => $module,
            'description' => $description,
            'created_on' => now(),
            'user_type' => $userType
        ];

        if ($userType === 'supervisor') {
            $logData['supervisor_id'] = $userId;
            $logData['user_id'] = null;
        } else {
            // For both 'user' and 'admin' types, use user_id
            $logData['user_id'] = $userId;
            $logData['supervisor_id'] = null;
        }

        return Log::create($logData);
    }

    /**
     * Log profile updates
     */
    public static function logProfileUpdate($changes = [], $userType = 'user')
    {
        $description = 'Profile updated';
        if (!empty($changes)) {
            $description .= ': ' . implode(', ', array_keys($changes));
        }
        
        return self::createLog('profile_update', 'Profile', $description, null, $userType);
    }

    /**
     * Log user creation
     */
    public static function logUserCreation($userName, $userType = 'User')
    {
        return self::createLog(
            'user_created', 
            'User Management', 
            "Created new {$userType}: {$userName}"
        );
    }

    /**
     * Log user updates
     */
    public static function logUserUpdate($userName, $changes = [])
    {
        $description = "Updated user: {$userName}";
        if (!empty($changes)) {
            $description .= ' - Changes: ' . implode(', ', array_keys($changes));
        }
        
        return self::createLog('user_updated', 'User Management', $description);
    }

    /**
     * Log module access
     */
    public static function logModuleAccess($moduleName, $action = 'accessed')
    {
        return self::createLog(
            'module_access', 
            $moduleName, 
            "{$action} {$moduleName} module"
        );
    }

    /**
     * Log login
     */
    public static function logLogin($userType = 'user')
    {
        return self::createLog('login', 'Authentication', 'User logged in', null, $userType);
    }

    /**
     * Log logout
     */
    public static function logLogout($userType = 'user')
    {
        return self::createLog('logout', 'Authentication', 'User logged out', null, $userType);
    }

    /**
     * Log password change
     */
    public static function logPasswordChange()
    {
        return self::createLog('password_change', 'Profile', 'Password changed');
    }

    /**
     * Log company information update
     */
    public static function logCompanyUpdate($changes = [])
    {
        $description = 'Company information updated';
        if (!empty($changes)) {
            $description .= ': ' . implode(', ', array_keys($changes));
        }
        
        return self::createLog('company_update', 'Profile', $description);
    }

    /**
     * Log supervisor creation
     */
    public static function logSupervisorCreation($supervisorName)
    {
        return self::createLog(
            'supervisor_created', 
            'Supervisor Management', 
            "Created new supervisor: {$supervisorName}"
        );
    }

    /**
     * Log department creation
     */
    public static function logDepartmentCreation($departmentName)
    {
        return self::createLog(
            'department_created', 
            'Department Management', 
            "Created new department: {$departmentName}"
        );
    }
}
