<?php

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../config/app.php';

if (!session_id()) {
    session_start();
}

use Pecee\SimpleRouter\SimpleRouter;
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad();

print(getenv('ABC'));

SimpleRouter::setDefaultNamespace('src\Http\Controllers');

require __DIR__ . '/../routes/web.php';

SimpleRouter::start();
