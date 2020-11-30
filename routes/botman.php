<?php

use App\Http\Controllers\BotManController;

$botman = resolve('botman');

$botman->hears('Start', 'App\Http\Controllers\ConversationController@index');

$botman->hears('/dog/random', 'App\Http\Controllers\DogRequestController@getRandomDogImage');
$botman->hears('/quote/random', 'App\Http\Controllers\QuoteRequestController@getRandomQuote');
$botman->hears('/news/latest', 'App\Http\Controllers\NewsRequestController@getLatestFeed');