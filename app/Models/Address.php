<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = ['name', 'lat', 'lng', 'addressable_id', 'addressable_type'];

    public function addressable()
    {
        return $this->morphTo();
    }
}
