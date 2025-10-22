<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model
{
    use HasFactory;

    protected $table = 'user_infos';

    protected $fillable = [
        'user_id',
        'admin_id',
        'superadmin_id',
        'user_type_id',
        'first_name',
        'last_name',
        'phone',
        'cnic',
        'gender',
        'avatar',
        'address',
        'city',
        'job_title',
        'department',
        'department_id',
        'joining_date',
        'bank_account_title',
        'bank_account_number',
        'company',
        'bio',
        'linkedin_url',
        'twitter_url',
        'website_url',
        'emergency_contact_name',
        'emergency_contact_phone',
        'emergency_contact_relationship',
        'timezone',
        'language',
        'email_notifications',
        'sms_notifications',
        'created_by_type',
        'created_by_id',
        'salary'
    ];

    protected function casts(): array
    {
        return [
            'joining_date' => 'date',
            'email_notifications' => 'boolean',
            'sms_notifications' => 'boolean'
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function userType()
    {
        return $this->belongsTo(UserType::class);
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}