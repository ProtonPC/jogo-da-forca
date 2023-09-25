<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Pecee\SimpleRouter\SimpleRouter as Router;

Router::get('/', [UserController::class, 'index'])->name('index');

Router::get('/login', [AuthController::class, 'login'])->name('auth.login');
Router::get('/register', [AuthController::class, 'register'])->name('auth.register');
