<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Log extends Model
{
    use HasFactory;

    // Disable automatic timestamps since we use custom created_on field
    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'user_type',
        'supervisor_id',
        'type',
        'module',
        'description',
        'created_on'
    ];

    protected $casts = [
        'created_on' => 'datetime',
    ];

    /**
     * Get the user that performed the action.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the supervisor that performed the action.
     */
    public function supervisor(): BelongsTo
    {
        return $this->belongsTo(Supervisor::class);
    }

    /**
     * Get the actor (user or supervisor) that performed the action.
     */
    public function actor()
    {
        if ($this->user_type === 'supervisor' && $this->supervisor_id) {
            return $this->supervisor;
        }
        return $this->user;
    }

    /**
     * Scope to get logs for a specific admin and their users/supervisors
     */
    public function scopeForAdmin($query, $adminId)
    {
        return $query->where(function($q) use ($adminId) {
            // Logs from users under this admin
            $q->where(function($userQuery) use ($adminId) {
                $userQuery->where('user_type', 'user')
                         ->whereHas('user', function($u) use ($adminId) {
                             $u->where('admin_id', $adminId);
                         });
            })
            // Logs from supervisors under this admin
            ->orWhere(function($supervisorQuery) use ($adminId) {
                $supervisorQuery->where('user_type', 'supervisor')
                               ->whereHas('supervisor', function($s) use ($adminId) {
                                   $s->where('admin_id', $adminId);
                               });
            })
            // Logs from the admin themselves
            ->orWhere(function($adminQuery) use ($adminId) {
                $adminQuery->where('user_type', 'user')
                           ->where('user_id', $adminId);
            });
        });
    }

    /**
     * Scope to get logs for a specific user
     */
    public function scopeForUser($query, $userId)
    {
        return $query->where('user_id', $userId);
    }

    /**
     * Scope to search logs by keyword
     */
    public function scopeSearch($query, $keyword)
    {
        if (empty($keyword)) {
            return $query;
        }

        return $query->where(function($q) use ($keyword) {
            $q->where('type', 'like', "%{$keyword}%")
              ->orWhere('module', 'like', "%{$keyword}%")
              ->orWhere('description', 'like', "%{$keyword}%")
              ->orWhereHas('user', function($userQuery) use ($keyword) {
                  $userQuery->where('first_name', 'like', "%{$keyword}%")
                           ->orWhere('last_name', 'like', "%{$keyword}%")
                           ->orWhere('email', 'like', "%{$keyword}%");
              })
              ->orWhereHas('supervisor', function($supervisorQuery) use ($keyword) {
                  $supervisorQuery->where('first_name', 'like', "%{$keyword}%")
                                 ->orWhere('last_name', 'like', "%{$keyword}%")
                                 ->orWhere('email', 'like', "%{$keyword}%");
              });
        });
    }
}