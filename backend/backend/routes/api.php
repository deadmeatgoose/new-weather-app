<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\WeatherController;

/*
|--------------------------------------------------------------------------|
| API Routes                                                              |
|--------------------------------------------------------------------------|
| Here is where you can register API routes for your application.          |
|--------------------------------------------------------------------------|
*/

// Test route to check if the API is working
Route::get('/test', function () {
    return response()->json(['message' => 'API is working']);
});

// Define the route to fetch weather information
Route::get('/weather', [WeatherController::class, 'getWeather']);
