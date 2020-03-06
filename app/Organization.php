<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Organization extends Model
{
    use SoftDeletes;

    protected $fillable = ['name'];

    public function users(){
        return $this->belongsToMany(User::class, 'user_organizations');
    }

    public function events(){
        return $this->hasMany(Event::class);
    }
}
