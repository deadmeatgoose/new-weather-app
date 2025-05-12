<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Controller;

class WeatherController extends Controller
{
    public function getWeather(Request $request)
    {
        $city = $request->query('city');
        if (!$city) {
            return response()->json(['error' => 'City is required'], 400);
        }

        $apiKey = config('services.openweathermap.key');
        $url = "https://api.openweathermap.org/data/2.5/weather?q={$city}&appid={$apiKey}&units=metric";

        $response = Http::get($url);

        if ($response->failed()) {
            return response()->json(['error' => 'Failed to fetch weather data'], 500);
        }

        return response()->json($response->json());
    }
}
