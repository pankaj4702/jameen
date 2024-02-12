<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Spatie\Geocoder\Facades\Geocoder;
use GuzzleHttp\Client;

class LocationController extends Controller
{
    public function getLocation()
    {
        $code = 302017;
        $countryCode = 'IN'; // ISO 3166-1 alpha-2 country code for India
        $url = "https://nominatim.openstreetmap.org/?format=json&addressdetails=1&q={$code}&format=json&limit=1&countrycodes={$countryCode}";


            $client = new Client();
            $response = $client->get($url);

            $data = json_decode($response->getBody(), true);


            dd($data);

}
}
