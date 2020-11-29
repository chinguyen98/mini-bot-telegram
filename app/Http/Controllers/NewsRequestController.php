<?php

namespace App\Http\Controllers;

use App\Services\NewsService;
use Illuminate\Http\Request;

class NewsRequestController extends Controller
{
    /**
     * @var NewsService
     */
    private $newsService;

    /**
     * NewsRequestController constructor.
     */
    public function __construct()
    {
        $this->newsService = new NewsService();
    }

    /**
     * Get Latest Feed
     *
     * @param $bot
     */
    public function getLatestFeed($bot)
    {
        $bot->reply($this->newsService->fetchLatestFeed());
    }
}
