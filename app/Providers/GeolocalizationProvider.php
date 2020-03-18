<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class GeolocalizationProvider extends ServiceProvider
{
    public function register()
    {
        app()->bind('geolocalization', function(){
            return new \App\Repositories\Geolocalization;
        });
    }

    public function boot()
    {
        //
    }
}
