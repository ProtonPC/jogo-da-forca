<?php

namespace App\Helpers;

class Session
{
    public static function init()
    {
        if (!session_id()) {
            session_start();
        }
    }
    public static function get(string $key): string
    {
        Session::init();
        return self::has($key) ? $_SESSION[$key] : '';
    }

    public static function set(string $key, string $value): void
    {
        Session::init();
        $_SESSION[$key] = $value;
    }

    public static function unset(string $key): void
    {
        if (self::has($key)) {
            unset($_SESSION[$key]);
        }
    }

    public static function has(string $key): bool
    {
        return isset($_SESSION[$key]);
    }

    public static function isEmpty(string $key): bool
    {
        return self::has($key) && empty($_SESSION[$key]);
    }

    public static function destroy(): void
    {
        $_SESSION = [];
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(
                session_name(),
                '',
                time() - 42000,
                $params["path"],
                $params["domain"],
                $params["secure"],
                $params["httponly"]
            );
        }
        session_destroy();
    }
}
