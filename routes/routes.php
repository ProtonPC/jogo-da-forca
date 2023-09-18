<?php

use App\Controllers\IndexController;
use Pecee\SimpleRouter\SimpleRouter as Router;

Router::get('/', [IndexController::class, 'index'])->name('index');
