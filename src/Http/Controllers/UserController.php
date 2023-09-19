<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends BaseController
{
    public function index()
    {
        return $this->view('user/user.html', [
            'user' => new User('John Doe', 'admin'),
        ]);
    }
}
