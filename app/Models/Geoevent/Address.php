<?php

namespace App\Models\Geoevent;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'lat', 'lng', 'addressable_id', 'addressable_type'];

    public function addressable()
    {
        return $this->morphTo();
    }
}
