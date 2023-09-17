<?php

/**
 * Execute var_dump on $param end die the aplication
 */
function dd($param): void
{
    var_dump($param);
    die();
}

/**
 * Execute var_dump on $param end continue the aplication
 */
function dump($param): void
{
    var_dump($param);
}
