<?php

namespace App\Http\Controllers;

class UserController extends BaseController
{
    public function index()
    {
        return $this->view('user/user.html', ['name' => 'João']);
    }
}
