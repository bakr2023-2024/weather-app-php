<?php

namespace Bakr231\WeatherApp;

use GuzzleHttp\Client;

class WeatherService
{
    private readonly string $api_key, $api_url;
    private readonly Client $client;

    public function __construct()
    {
        $this->api_key = $_ENV["API_KEY"];
        $this->api_url = "https://api.openweathermap.org/data/2.5/weather";
        $this->client = new Client();
    }

    public function getWeather(string $city): array
    {
        $res = $this->client->get($this->api_url, [
            'query' => [
                'q' => $city,
                'appid' => $this->api_key,
                'units' => 'metric'
            ]
        ]);
        $data = json_decode($res->getBody()->getContents(), true);
        return [
            "city" => $data["name"],
            "temperature" => $data['main']['temp'],
            "description" => $data['weather'][0]['description'],
            "humidity" => $data['main']['humidity']
        ];
    }
}
