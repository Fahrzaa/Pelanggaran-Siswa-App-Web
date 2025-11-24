<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WeatherController extends Controller
{
    public function index(Request $request)
    {
        // Ambil nama kota dari query (default: Jakarta)
        $city = $request->input('city', 'Jakarta');

        // Ambil API Key dari .env
        $apiKey = env('6c75c6cf8eb3f81af3bc0ae649eceb5b');

        // Request ke OpenWeather API
        $response = Http::withoutVerifying()->get("https://api.openweathermap.org/data/2.5/weather?q={CITY_NAME}&appid={API_KEY}&units=metric&lang=id
", [
            'q' => $city,
            'appid' => $apiKey,
            'units' => 'metric',
            'lang' => 'id',
        ]);

        // Convert hasilnya jadi array
        $weatherData = $response->json();

        // Kirim ke view
        return view('weather', compact('weatherData', 'city'));
    }
}
