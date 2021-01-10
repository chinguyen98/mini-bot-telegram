<?php

namespace App\Services;

use GuzzleHttp\Client;

class QuoteService
{
    /**
     * Endpoint to Paper Quotes for getting data.
     */
    private const BASE_RANDOM_QUOTE_ENDPOINT = "https://api.paperquotes.com/apiv1/quotes?limit=1&offset=";

    /**
     * @var Client
     */
    private $client;

    /**
     * QuoteService constructor.
     */
    public function __construct()
    {
        $this->client = new Client();
    }

    /**
     * Get a random quote!
     *
     * @return string
     */
    public function fetchRandomQuote()
    {
        try {
            $offset = rand(0, 5000);
            $endpoint = self::BASE_RANDOM_QUOTE_ENDPOINT . $offset;
            $apikey = strtr("Token apikey", [
                'apikey' => config('paper_quotes_api_key'),
            ]);

            $response = $this->client->get($endpoint, [
                'headers' => [
                    'Authorization' => $apikey,
                ]
            ])->getBody();

            $data = json_decode($response);
            $message = strtr('_quote (by _author with _like like(s)).', [
                '_quote' => $data->results[0]->quote,
                '_author' => $data->results[0]->author === "" ? "Anonymous" : $data->results[0]->author,
                '_like' => $data->results[0]->likes,
            ]);

            return $message;
        } catch (Exception $exception) {
            return "Error! Please try again";
        }
    }
}