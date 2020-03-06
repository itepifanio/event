<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = ['x', 'y', 'addressable_id', 'addressable_type'];

    public function addressable()
    {
        return $this->morphTo();
    }
}
