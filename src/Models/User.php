<?php

namespace App\Models;

use Stringable;

class User
{
    private String $name;
    private String $userName;
    private String $password;
    private String $role;

    public function __construct(string $name, string $userName, string $password, string $role)
    {
        $this->name = $name;
        $this->userName = $userName;
        $this->password = $password;
        $this->role = $role;
    }

    public function setName(String $name):void
    {
        $this->name = $name;
    }

    public function getName(): String
    {
        return $this->name;
    }

    public function setUserName(String $userName): void
    {
        $this->userName = $userName;
    }

    public function getUserName(): string
    {
        return $this->userName;
    }

    public function setRole(String $role)
    {
        $this->role = $role;
    }

    public function getRole(): string
    {
        return $this->role;
    }
}
