<?php

namespace App\Geoevent\Services;

use GuzzleHttp\Client;

class GeolocalizationService
{
    private Client $geoApi;
    private string $geoUrl;

    public function __construct()
    {
        $this->geoApi = new Client();
        $this->geoUrl = 'https://www.googleapis.com/geolocation/v1/geolocate?key=' . env('GOOGLE_GEOCODER');
    }

    public function current() : object
    {
        $req = $this->geoApi->post($this->geoUrl, [
            'headers' => [
                'Content-Type' => 'application/json'
            ]
        ]);

        return json_decode($req->getBody());
    }
}
