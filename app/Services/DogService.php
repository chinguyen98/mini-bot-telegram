<?php

namespace App\Services;

use Exception;
use GuzzleHttp\Client;
use function json_decode;

class DogService
{
    /**
     * The endpoint that get a dog random image.
     */
    private const RANDOM_DOG_IMAGE_ENDPOINT = 'https://dog.ceo/api/breeds/image/random';

    /**
     * @var Client
     */
    private $client;

    /**
     * DogService constructor.
     */
    public function __construct()
    {
        $this->client = new Client();
    }

    /**
     * Get a random image. A link will be return or show error!
     *
     * @return string
     */
    public function getRandomImage()
    {
        try {
            $response = $this->client->get(self::RANDOM_DOG_IMAGE_ENDPOINT)->getBody();
            $data = json_decode($response);
            return $data->message;
        } catch (Exception $exception) {
            return "Error! Please try again";
        }
    }
}