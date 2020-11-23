<?php

use App\Http\Controllers\BotManController;

$botman = resolve('botman');

$botman->hears('/dog/random', 'App\Http\Controllers\DogRequestController@getRandomDogImage');
$botman->hears('/quote/random', 'App\Http\Controllers\QuoteRequestController@getRandomQuote');