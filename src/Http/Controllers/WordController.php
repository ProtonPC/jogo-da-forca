<?php

namespace App\Http\Controllers;

class WordController extends BaseController
{
    public function createWord()
    {
    }

    public function readWord(int $id)
    {
    }

    public function readAllWord()
    {
        return $this->view('word/index.html', [
            'user' => 'dados',
        ]);
    }

    public function updateWord(int $id)
    {
    }

    public function deleteWord(int $id)
    {
    }

    public function deleteAllWord()
    {
    }
}
