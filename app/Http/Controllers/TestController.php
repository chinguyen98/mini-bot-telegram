<?php

namespace App\Http\Controllers;

use App\Services\DogService;
use App\Services\NewsService;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function test(NewsService $newsService)
    {
        dd($newsService->fetchLatestFeed());
    }
}
