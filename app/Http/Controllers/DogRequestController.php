<?php

namespace App\Http\Controllers;

use App\Services\DogService;
use Illuminate\Http\Request;

class DogRequestController extends Controller
{
    private $photo;

    public function __construct()
    {
        $this->photo = new DogService();
    }

    public function getRandomDogImage($bot)
    {
        return $bot->reply($this->photo->getRandomImage());
    }
}
