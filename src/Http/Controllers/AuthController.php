<?php

namespace App\Http\Controllers;

use App\Helpers\Session;
use App\Models\User;
use App\Repository\UserRepository;

class AuthController extends BaseController
{
    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $userName = $_POST['username'];
            $password = $_POST['password'];
            $userId = UserRepository::authenticateUser($userName, $password);
            if (!is_null($userId)) {
                Session::set('userId', $userId);
                Session::set('userName', $userName);
                header('Location: /dashboard');
            }
        }
        return $this->view('auth/login.html', []);
    }

    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $userName = $_POST['username'];
            $password = $_POST['password'];
            $user = new User($name, $userName, $password);
            UserRepository::create($user);
            header('Location: /login');
        }
        return $this->view('auth/register.html', []);
    }
    public function logout()
    {
        session_destroy();
        header('Location: /');
    }

    public function getDashboard()
    {
        $userName = Session::get('userName');
        $userId = Session::get('userId');
        return $this->view('user/dashboard.html', [
           'userName' => $userName,
           'userId' => $userId
        ]);
    }
}
