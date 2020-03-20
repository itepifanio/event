<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class Geolocalization extends Facade
{
    /**
     * function current() : json
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'geolocalization';
    }
}