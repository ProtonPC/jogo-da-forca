<?php

namespace App\Http\Middlewares;

use App\Helpers\Session;
use Pecee\Http\Middleware\IMiddleware;
use Pecee\Http\Request;

class AuthMiddleware implements IMiddleware
{
    public function handle(Request $request): void
    {
        $userId = Session::get('userId');
        // If authentication failed, redirect request to user-login page.
        if (!$userId) {
            header("Location: /login");
            #$request->setRewriteUrl(url('user.login'));
        }
    }
}
