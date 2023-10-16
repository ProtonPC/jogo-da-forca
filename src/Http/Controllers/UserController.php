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
            $userName = $_POST['username'];
            $user = new User($name, $userName);
            UserRepository::update($id, $user);
            header('Location: /dashboard');
        }
        $user = UserRepository::find($id);
        return $this->view('user/form.html', [
            'user' => $user,
            'id' => $id
        ]);
    }
}
