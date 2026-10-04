<?php

use Bakr231\WeatherApp\WeatherService;

require_once __DIR__ . '/vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

if (count($argv) !== 2)
    exit("Usage: php weather.php <city-name>");
$weatherService = new WeatherService();
print_r($weatherService->getWeather($argv[1]));
