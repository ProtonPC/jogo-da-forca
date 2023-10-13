<?php

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../config/app.php';

use Pecee\SimpleRouter\SimpleRouter;

SimpleRouter::setDefaultNamespace('src\Http\Controllers');

require __DIR__ . '/../routes/web.php';

SimpleRouter::start();
