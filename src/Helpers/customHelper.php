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

/**
 * Convert the param $code to a char string
 */
function getCharacter(int $code): string
{
    if($code > 90) $code-=32;
    if($code < 65 || $code > 90)
    {
        throw new Exception("The code must be between 65 and 90", 1);
    }
    return chr($code);
}
