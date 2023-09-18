<?php

require __DIR__ . '/../vendor/autoload.php';

use Pecee\SimpleRouter\SimpleRouter;

SimpleRouter::setDefaultNamespace('src\Http\Controllers');

require __DIR__ . '/../routes/routes.php';

SimpleRouter::start();
