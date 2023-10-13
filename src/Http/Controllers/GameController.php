<?php

namespace App\Http\Controllers;

class GameController extends BaseController
{
    public function index()
    {
        $words = [
            'abacate',
            'banana',
            'pera',
            'manga',
            'laranja',
            'uva',
            'morango',
        ];

        $word = $words[rand(0, count($words) - 1)];

        return $this->view('game/index.html', [
            'word' => $word,
        ]);
    }
}
