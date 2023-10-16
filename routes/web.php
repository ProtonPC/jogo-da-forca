<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\WordController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\UserController;
use Pecee\SimpleRouter\SimpleRouter as Router;
use App\Http\Middlewares\AuthMiddleware;

Router::get('/', [IndexController::class, 'index'])->name('index');
Router::get('/play', [GameController::class, 'index'])->name('game.index');
Router::get('/play/{letter}', [GameController::class, 'play'])->name('game.letter');
Router::get('/reset-game', [GameController::class, 'resetGame'])->name('game.reset');
Router::match(['get', 'post'], '/login', [AuthController::class, 'login'])->name('auth.login');
Router::match(['get', 'post'], '/register', [AuthController::class, 'register'])->name('auth.register');
//Router::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Router::group(['middleware' => AuthMiddleware::class], function () {
    Router::get('/dashboard', [AuthController::class, 'getDashboard'])->name('dashboard');
    Router::match(['get', 'post'], '/user/edit/{id}', [UserController::class, 'editUser'])->name('user.edit');
    Router::get('/logout', [AuthController::class, 'logout'])->name('auth.delete');

    Router::match(['get', 'post'],'/words/create', [WordController::class, 'createWord'])->name('word.create');
    Router::match(['get', 'post'],'/words/edit/{id}', [WordController::class, 'updateWord'])->name('word.update');
    Router::match(['get', 'post'],'/words/deleteAll', [WordController::class, 'deleteAllWord'])->name('words.deleteAll');
    Router::get('/words/get/{id}', [WordController::class, 'getWord'])->name('word.get');
    Router::get('/words', [WordController::class, 'readAllWord'])->name('words.index');
    Router::post('/words/delete/{id}', [WordController::class, 'deleteWord'])->name('word.delete');
});
