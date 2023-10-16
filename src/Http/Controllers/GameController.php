<?php

namespace App\Http\Controllers;

use App\Helpers\Session;
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
        $word = WordService::getCurrentWord();

        foreach ($word['letters'] as $key => $value) {
            if (Session::has('letter' . $key) && Session::get('letter' . $key) === strtolower($letter)) {
                $word['letters'][$key] = strtolower($letter);
            }
        }

        Session::set('current_word_encoded', implode($word['letters']));

        // $currentWordEncoded = Session::get('current_word_encoded');
        // $word['encoded'] = str_split($word['encoded']);

        // foreach ($word['encoded'] as $key => $letter) {
        //     $word['encoded'][$key] = $word['letters'][$key];
        // }
        // Session::set('current_word_encoded', implode($word['encoded']));
        // $word['encoded'] = array_map(function ($letter) {
        //     return $letter === '_' ? $letter : strtolower($letter);
        // }, str_split($word['encoded']));

        // $word['encoded'] = implode($word['encoded']);

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
