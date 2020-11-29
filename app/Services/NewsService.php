<?php

namespace App\Services;

use willvincent\Feeds\Facades\FeedsFacade;

class NewsService
{
    /**
     * Link to latest RSS news.
     */
    private const GET_LATEST_NEWS_ENDPOINT = 'https://vnexpress.net/rss/tin-moi-nhat.rss';

    /**
     * NewsService constructor.
     */
    public function __construct()
    {

    }

    /**
     * Random fetch a rss latest news.
     *
     * @return string
     */
    public function fetchLatestFeed()
    {
        $random_number = rand(0, 30);
        $feed = FeedsFacade::make(self::GET_LATEST_NEWS_ENDPOINT);

        $title = $feed->get_items()[$random_number]->get_title();
        $link = $feed->get_items()[$random_number]->get_permalink();

        $data = strtr("_title (_link)", ['_title' => $title, '_link' => $link]);
        return $data;
    }
}