<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Subscription extends Model
{
    use SoftDeletes;

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
}
