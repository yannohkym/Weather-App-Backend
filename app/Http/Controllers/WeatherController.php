<?php


    // app/Http/Controllers/WeatherController.php
    namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Http;
    
    class WeatherController extends Controller
    {
        public function getWeather(Request $request)
        {
            $apiKey = env('OPENWEATHERMAP_API_KEY');
            $city = $request->input('city', 'London');
            $url = "https://api.openweathermap.org/data/2.5/weather?q={$city}&appid={$apiKey}&units=metric";
    
            $response = Http::get($url);
    
            if ($response->successful()) {
                return response()->json($response->json());
            }
    
            return response()->json(['error' => 'Unable to fetch weather data'], 500);
        }
        public function getforecast(Request $request)
        {
            $apiKey = env('OPENWEATHERMAP_API_KEY');
            $city = $request->input('city', 'London');
            $url = "https://api.openweathermap.org/data/2.5/forecast?q={$city}&appid={$apiKey}&units=metric";
            $response = Http::get($url);
    
            if ($response->successful()) {
                return response()->json($response->json());
            }
    
            return response()->json(['error' => 'Unable to fetch weather data'], 500);
        }
    }
