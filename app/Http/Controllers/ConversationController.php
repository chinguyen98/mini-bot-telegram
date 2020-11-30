<?php

namespace App\Http\Controllers;

use App\Conversation\DefaultConversation;
use Illuminate\Http\Request;

class ConversationController extends Controller
{
    public function __construct()
    {

    }

    public function index($bot)
    {
        $bot->startConversation(new DefaultConversation());
    }
}
