<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Repository\UserRepository;

class UserController extends BaseController
{
    public function editUser(int $id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $userName = $_POST['userName'];
            $password = $_POST['password'];
        }
        $user = new User($name, $password);
        $user->setUserName($userName);
        UserRepository::update($id, $user);
        header('Location: /dashboard');
    }

    public function getEditUser(int $id)
    {
        $user = UserRepository::find($id);
        return $this->view('user/form.html', [
            'user' => $user
        ]);
    }
}
