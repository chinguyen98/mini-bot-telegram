<?php

namespace App\Http\Controllers;

use App\Services\QuoteService;

class QuoteRequestController extends Controller
{
    private $quoteService;

    public function __construct()
    {
        $this->quoteService = new QuoteService();
    }

    public function getRandomQuote($bot)
    {
        return $bot->reply($this->quoteService->fetchRandomQuote());
    }
}
