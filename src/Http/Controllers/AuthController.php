<?php

namespace App\Http\Controllers;

class AuthController extends BaseController
{
    public function login()
    {
        return $this->view('auth/login.html', []);
    }

    public function register()
    {
        return $this->view('auth/register.html', []);
    }
}
