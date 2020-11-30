<?php

namespace App\Conversation;

use App\Services\DogService;
use App\Services\NewsService;
use App\Services\QuoteService;
use BotMan\BotMan\Messages\Conversations\Conversation;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Outgoing\Question;

class DefaultConversation extends Conversation
{
    public function __construct()
    {

    }

    public function defaultQuestion()
    {
        $question = Question::create('Hello! What do u want?')
            ->addButtons([
                Button::create('Get a photo of dog')->value('dog_random'),
                Button::create('Get a random quote')->value('quote_random'),
                Button::create('Get a latest news')->value('news_latest'),
            ]);
        return $this->ask($question, function (Answer $answer) {
            if ($answer->isInteractiveMessageReply()) {
                switch ($answer->getValue()) {
                    case 'dog_random':
                    {
                        $this->say((new DogService())->getRandomImage());
                        break;
                    }
                    case 'quote_random':
                    {
                        $this->say((new QuoteService())->fetchRandomQuote());
                        break;
                    }
                    case 'news_latest':
                    {
                        $this->say((new NewsService())->fetchLatestFeed());
                        break;
                    }
                }
            }
        });
    }

    public function run()
    {
        $this->defaultQuestion();
    }
}