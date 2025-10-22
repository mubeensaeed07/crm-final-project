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
        'can_access_dealer_support'
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
        'can_access_dealer_support' => 'boolean'
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