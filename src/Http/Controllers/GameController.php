<?php

namespace App\Http\Controllers;

use App\Exceptions\FinishGameException;
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
            'tries' => Session::get('tries'),
        ]);
    }

    public function play($letter)
    {
        GameService::makePlay($letter);
        try {
            GameService::handleWinner();
        } catch (FinishGameException $e) {
            return $this->view('game/endgame.html', [
                'message' => $e->getMessage(),
                'final_image' => Session::get('final_image'),
            ]);
        }
        header('Location: /play');
    }

    public function resetGame()
    {
        WordService::unsetCurrentWord();
        header('Location: /');
    }
}
