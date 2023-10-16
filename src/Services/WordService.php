<?php

namespace App\Services;

use App\Helpers\Session;
use App\Repository\WordRepository;

class WordService
{
    public static function setCurrentWord(): void
    {
        if (!Session::has('current_word_id')) {
            $current_word = WordRepository::getAll()[rand(0, count(WordRepository::getAll()) - 1)];
            Session::set('current_word_id', $current_word['id']);
            Session::set('current_word_content', $current_word['content']);
            Session::set('current_word_level', $current_word['level']);
            Session::set('current_word_tip', $current_word['tip']);
            Session::set('current_word_length', count(self::encodeToArray($current_word['content'])));
        }
    }

    public static function getCurrentWord(): array
    {
        self::setCurrentWord();

        return [
            'id' => Session::get('current_word_id'),
            'content' => Session::get('current_word_content'),
            'level' => Session::get('current_word_level'),
            'tip' => Session::get('current_word_tip'),
            'length' => Session::get('current_word_length'),
            'letters' => self::encodeToArray(Session::get('current_word_content')),
            'encoded' => Session::get('current_word_encoded'),
        ];
    }

    private static function encodeToArray(string $word): array
    {
        $letters = str_split($word, 1);
        foreach ($letters as $key => $letter) {
            Session::set('letter' . $key, strtolower($letter)); // put letters in session
        }

        // encode letters
        $letters = array_map(function () {
            return '_' ;
        }, $letters);

        return $letters;
    }

    public static function unsetCurrentWord(): void
    {
        self::unsetArrayWord();
        Session::unset('current_word_id');
        Session::unset('current_word_content');
        Session::unset('current_word_level');
        Session::unset('current_word_tip');
        Session::unset('current_word_length');
        Session::unset('current_word_encoded');
    }

    private static function unsetArrayWord(): void
    {
        $word = str_split(Session::get('current_word_content'), 1);
        foreach ($word as $key => $letter) {
            Session::unset('letter' . $key);
        }
    }
}
