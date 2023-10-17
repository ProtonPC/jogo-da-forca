<?php

namespace App\Services;

use App\Exceptions\FinishGameException;
use App\Helpers\Session;

class GameService
{
    public static function makePlay(string $letter = ''): void
    {
        $hasLetter = true;
        $encoded = str_split(Session::get('current_word_encoded'), 1);
        foreach ($encoded as $key => $value) {
            if (Session::has('letter' . $key) && Session::get('letter' . $key) === strtolower($letter)) {
                $encoded[$key] = strtolower($letter);
                $hasLetter = false;
            }
        }
        Session::set('current_word_encoded', implode($encoded));
        if ($hasLetter) {
            Session::set('tries', intval(Session::get('tries')) - 1);
        }
    }

    private static function isWin(): bool
    {
        return Session::get('current_word_encoded') === Session::get('current_word_content');
    }

    public static function handleWinner(): void
    {
        if (self::isWin()) {
            self::setupEndGame(Session::get('current_img') . '.jpg');
            throw new FinishGameException("You Win");
        }

        if (intval(Session::get('tries')) <= 0 && !self::isWin()) {
            self::setupEndGame('win.png');
            throw new FinishGameException("Game Over");
        }
    }

    private static function setupEndGame($final_image): void
    {
        Session::set('final_image', $final_image);
        WordService::unsetCurrentWord();
        Session::set('is_endgame', true);
    }
}
