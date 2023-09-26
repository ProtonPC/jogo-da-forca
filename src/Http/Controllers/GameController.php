<?php

namespace App\Http\Controllers;

class GameController extends BaseController
{
    public function index()
    {
        return $this->view('game/index.html', [
            'user' => 'dados',
        ]);
    }
}
