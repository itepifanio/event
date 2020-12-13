<?php

namespace App\Geoevent\Facades;

use Illuminate\Support\Facades\Facade;
use App\Geoevent\Services\GeolocalizationService;

class Geolocalization extends Facade
{
    /**
     * function current() : json
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return GeolocalizationService::class;
    }
}
