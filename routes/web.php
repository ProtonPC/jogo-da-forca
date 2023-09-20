<?php

use App\Http\Controllers\UserController;
use Pecee\SimpleRouter\SimpleRouter as Router;

Router::get('/', [UserController::class, 'index'])->name('index');
