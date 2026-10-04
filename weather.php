<?php

use Bakr231\WeatherApp\WeatherService;

require_once __DIR__ . '/vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

if (count($argv) !== 2)
    exit("Usage: php weather.php <city-name>");
$weatherService = new WeatherService();
$data = $weatherService->getWeather($argv[1]);

echo ("\nCity: {$data['city']}\nTemperature: {$data['temperature']}\nDescription: {$data['description']}\nHumidity: {$data['humidity']}\n");