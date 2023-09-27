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

    public function login()
    {
        return true;
    }
    public function createProfile(User $user)
    {
        return true;
    }

    public function editProfile(User $user)
    {
        return true;
    }

    public function deleteProfile(User $user)
    {
        return true;
    }
}
