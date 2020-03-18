<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class Geolocalization extends Facade{
    protected static function getFacadeAccessor() { return 'geolocalization'; }
}