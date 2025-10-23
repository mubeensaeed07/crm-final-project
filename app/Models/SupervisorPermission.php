<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupervisorPermission extends Model
{
    use HasFactory;

    protected $fillable = [
        'supervisor_id',
        'module_id',
        'can_create_users',
        'can_edit_users',
        'can_delete_users',
        'can_reset_passwords',
        'can_assign_modules',
        'can_view_reports',
        'can_mark_salary_paid',
        'can_mark_salary_pending',
        'can_view_salary_data',
        'can_manage_salary_payments',
        'can_access_user_support',
        'can_access_dealer_support',
        'user_support_can_view',
        'user_support_can_update',
        'user_support_can_expiry_update',
        'user_support_can_package_change',
        'user_support_can_add_days',
        'dealer_support_can_view',
        'dealer_support_can_update',
        'dealer_support_can_expiry_update',
        'dealer_support_can_package_change',
        'dealer_support_can_add_days'
    ];

    protected $casts = [
        'can_create_users' => 'boolean',
        'can_edit_users' => 'boolean',
        'can_delete_users' => 'boolean',
        'can_reset_passwords' => 'boolean',
        'can_assign_modules' => 'boolean',
        'can_view_reports' => 'boolean',
        'can_mark_salary_paid' => 'boolean',
        'can_mark_salary_pending' => 'boolean',
        'can_view_salary_data' => 'boolean',
        'can_manage_salary_payments' => 'boolean',
        'can_access_user_support' => 'boolean',
        'can_access_dealer_support' => 'boolean',
        'user_support_can_view' => 'boolean',
        'user_support_can_update' => 'boolean',
        'user_support_can_expiry_update' => 'boolean',
        'user_support_can_package_change' => 'boolean',
        'user_support_can_add_days' => 'boolean',
        'dealer_support_can_view' => 'boolean',
        'dealer_support_can_update' => 'boolean',
        'dealer_support_can_expiry_update' => 'boolean',
        'dealer_support_can_package_change' => 'boolean',
        'dealer_support_can_add_days' => 'boolean'
    ];

    // Relationships
    public function supervisor()
    {
        return $this->belongsTo(Supervisor::class);
    }

    public function module()
    {
        return $this->belongsTo(Module::class);
    }
}