<?php

namespace App\Services;

use App\Helpers\Session;

class GameService
{
    public static function makePlay(string $letter = ''): void
    {
        $encoded = str_split(Session::get('current_word_encoded'), 1);
        foreach ($encoded as $key => $value) {
            if (Session::has('letter' . $key) && Session::get('letter' . $key) === strtolower($letter)) {
                $encoded[$key] = strtolower($letter);
            }
        }
        Session::set('current_word_encoded', implode($encoded));
    }
}
