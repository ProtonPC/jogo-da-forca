<?php

namespace App\Http\Controllers;

use App\Helpers\Session;
use App\Models\User;
use App\Repository\UserRepository;
use PDO;

class AuthController extends BaseController
{
    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $userName = $_POST['useName'];
            $password = $_POST['password'];
            if (UserRepository::authenticateUser($userName, $password)) {
                Session::set('userName', $userName);
                header('Location: dashboard/index.html');
            }
        }
        return $this->view('auth/login.html', []);
    }

    public function register()
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
        UserRepository::create($user);
    }

    public function getRegister()
    {
        return $this->view('user/form.html', []);
    }
    public function logout()
    {
        session_destroy();
        header('Location: login.php');
    }
}
