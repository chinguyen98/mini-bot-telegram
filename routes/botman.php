<?php

use App\Http\Controllers\BotManController;

$botman = resolve('botman');

$botman->hears('/random', 'App\Http\Controllers\DogRequestController@getRandomDogImage');
