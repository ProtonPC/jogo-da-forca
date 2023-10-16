<?php

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../config/app.php';

if (!session_id()) {
    session_start();
}

use Pecee\SimpleRouter\SimpleRouter;
use Dotenv\Dotenv;

// Get the current directory
$currentDirectory = getcwd();
// Get the parent directory
$parentDirectory = dirname($currentDirectory);

$dotenv = Dotenv::createImmutable($parentDirectory);
$dotenv->load();

SimpleRouter::setDefaultNamespace('src\Http\Controllers');

require __DIR__ . '/../routes/web.php';

SimpleRouter::start();
