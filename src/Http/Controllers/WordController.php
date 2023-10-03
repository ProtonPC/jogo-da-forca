<?php

namespace App\Http\Controllers;

class WordController extends BaseController
{
    public function createWord()
    {
    }

    public function getWord(int $id)
    {
        // pega no banco a palavra que esse $id;
        // Retorna uma view "dashboard.html" com o objeto encontrado no banco
    }

    public function editWord(int $id)
    {
        echo "Chegou no médodo de editar";
        // pega no banco a palavra que esse $id;
        // Retorna uma view "form.html" com o objeto encontrado no banco
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
        // salvar no banco de dados
    }

    public function deleteWord(int $id)
    {
    }

    public function deleteAllWord()
    {
    }
}
