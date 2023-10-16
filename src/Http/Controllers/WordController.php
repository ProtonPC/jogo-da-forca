<?php

namespace App\Http\Controllers;

use App\Models\Word;
use App\Repository\WordRepository;

class WordController extends BaseController
{
    public function createWord()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $newWord = new Word($_POST["word"], $_POST["level"], $_POST["tip"]);
            $validWord = (new WordRepository())->ValidateWord($newWord);
            if (!$validWord) {
                die("não pode");
            }
            (new WordRepository())->create($newWord);
            header('Location: /words');
        }
        return $this->view('word/form.html', []);
    }

    public function getWord(int $id)
    {
        $words = (new WordRepository())->find($id);
        //return $this->view('word/index.html', ['words' => $words]);
        return $this->view('word/wordFound.html', ['words' => $words]);
    }



    public function readAllWord()
    {
        $words = (new WordRepository())->getAll();
        return $this->view('word/index.html', [
            'words' => $words
        ]);
    }

    public function updateWord(int $id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $editWord = new Word($_REQUEST["word"], $_REQUEST["level"], $_REQUEST["tip"]);
            (new WordRepository())->update($id, $editWord);
            header('Location: /words');
        }
        $word = (new WordRepository())->find($id);
        return $this->view('word/editForm.html', ['word' => $word]);
    }

    public function deleteWord(int $id)
    {
        $words = (new WordRepository()) -> delete($id);
        header('Location: /words');
    }

    public function deleteAllWord()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            (new WordRepository())->deleteAll();
            header('Location: /words');
        }
        return $this->view('word/deleteAll.html', []);
    }
}
