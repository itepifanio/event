<?php

namespace App\Models;

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
                ->withPivot('role');
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
