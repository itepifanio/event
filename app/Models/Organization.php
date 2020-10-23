<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Organization extends Model
{
    use SoftDeletes, HasFactory;

    protected $fillable = ['name', 'user_id', 'description', 'foundation_date'];

    public function users(){
        return $this->belongsToMany(User::class, 'user_organizations')
            ->withPivot('role');
    }

    public function owner(){
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function events(){
        return $this->hasMany(Event::class);
    }
}
