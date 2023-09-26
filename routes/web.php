<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\WordController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\UserController;
use Pecee\SimpleRouter\SimpleRouter as Router;

Router::get('/', [IndexController::class, 'index'])->name('index');

Router::get('/dashboard', [DashboardController::class, 'index'])->name('index');

Router::get('/users/edit', [UserController::class, 'edit'])->name('user.edit');

Router::get('/login', [AuthController::class, 'login'])->name('auth.login');
Router::get('/register', [AuthController::class, 'register'])->name('auth.register');

Router::get('/words', [WordController::class, 'readAllWord'])->name('words.index');

Router::get('/play', [GameController::class, 'index'])->name('game.index');
