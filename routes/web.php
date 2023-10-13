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

Router::get('/words/create', [WordController::class, 'createWord'])->name('word.form');
Router::post('/words/create', [WordController::class, 'createWord'])->name('words.form');
Router::get('/words/get/{id}', [WordController::class, 'getWord'])->name('word.teste');
Router::get('/words', [WordController::class, 'readAllWord'])->name('words.index');
Router::get('/words/edit/{id}', [WordController::class, 'editWord'])->name('game.edit');
Router::post('/words/edit/{id}', [WordController::class, 'updateWord'])->name('game.update');
Router::post('/words/delete/{id}', [WordController::class, 'deleteWord'])->name('word.index');
Router::get('/words/deleteAll', [WordController::class, 'deleteAllWord'])->name('words.index');
Router::post('/words/deleteAll', [WordController::class, 'deleteAllWord'])->name('words.index');

Router::get('/play', [GameController::class, 'index'])->name('game.index');
