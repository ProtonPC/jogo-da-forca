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
        $words = [
            [
                "id" => 1,
                "name" => "Primeira",
                "tip" => "A palavra mais usada",
                "level" => 1
            ],
            [
                "id" => 2,
                "name" => "Segunda",
                "tip" => "Uma das palavras mais usadas",
                "level" => 2
            ],
            [
                "id" => 3,
                "name" => "Terceira",
                "tip" => "Uma das palavras menos usadas",
                "level" => 3
            ],
        ];
        return $this->view('word/index.html', [
            'words' => $words
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
