<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subscription extends Model
{
    use SoftDeletes, HasFactory;

    protected $fillable = [
        'user_id', 'event_id',
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }
    public function events()
    {
        return $this->hasMany(Event::class);
    }
    public function scopeOfEvent($query, $id)
    {
        return $query->whereEventId($id);
    }
    public function scopeOfUser($query, $id)
    {
        return $query->whereUserId($id);
    }
}
