<?php

namespace App\Http\Controllers;

use App\Services\DogService;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function test(DogService $dogService)
    {
        dd($dogService->getRandomImage());
    }
}
