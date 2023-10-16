<?php

namespace App\Http\Controllers;

use App\Helpers\Session;
use App\Services\GameService;
use App\Services\WordService;

class GameController extends BaseController
{
    public function index()
    {
        $word = WordService::getCurrentWord();

        return $this->view('game/index.html', [
            'word' => $word,
        ]);
    }

    public function play($letter)
    {
        GameService::makePlay($letter);
        $word = WordService::getCurrentWord();

        return $this->view('game/index.html', [
            'word' => $word,
        ]);
    }

    public function resetGame()
    {
        WordService::unsetCurrentWord();
        header('Location: /');
    }
}
