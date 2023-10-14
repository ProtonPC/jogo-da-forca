<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Repository\UserRepository;

class UserController extends BaseController
{
    public function editProfile(int $id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $userName = $_POST['userName'];
            $password = $_POST['password'];
            $role = $_POST['role'];
        }
        $user = new User($name, $password);
        $user->setUserName($userName);
        $user->setRole($role);

        UserRepository::update($id, $user);
    }

    public function getEditUser(int $id)
    {

        $user = UserRepository::find($id);
        return $this->view('user/editform.html', [
            'user' => $user
        ]);
    }
}
