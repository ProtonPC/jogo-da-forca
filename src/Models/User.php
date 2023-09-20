<?php

namespace App\Models;

class User
{
    public function __construct(private string $name, private string $role)
    {
    }

    public function __toString()
    {
        return $this->name . ': ' . $this->role;
    }
}
