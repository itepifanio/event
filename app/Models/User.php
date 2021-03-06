<?php

namespace App\Models;

use App\Models\Geoevent\Address;
use App\Models\Geoevent\Attendance;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable, HasFactory;

    const ROLES_OWNER  = 'owner';
    const ROLES_ADMIN  = 'admin';
    const ROLES_COMMON = 'common';
    const ROLES = [
        self::ROLES_OWNER,
        self::ROLES_ADMIN,
        self::ROLES_COMMON,
    ];

    const STATUS_ACTIVE = 'active';
    const STATUS_PENDING = 'pending';
    const STATUS_REFUSED = 'refused';
    const STATUS_DISABLED = 'disabled';
    const STATUS = [
        self::STATUS_ACTIVE,
        self::STATUS_PENDING,
        self::STATUS_REFUSED,
        self::STATUS_DISABLED
    ];

    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function organizations()
    {
        return $this->belongsToMany(Organization::class, 'user_organizations')
                ->withPivot('role', 'status');
    }

    public function address()
    {
        return $this->morphOne(Address::class, 'addressable');
    }

    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }
}
