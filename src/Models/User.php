<?php

namespace App\Models;

use App\Contracts\BaseModel;

class User implements BaseModel
{
    private int $id;
    private string $name;
    private string $userName;
    private string $password;
    private string $role;

    public function __construct(string $name, string $userName, string $password, string $role)
    {
        $this->name = $name;
        $this->userName = $userName;
        $this->password = $password;
        $this->role = $role;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setUserName(string $userName): void
    {
        $this->userName = $userName;
    }

    public function getUserName(): string
    {
        return $this->userName;
    }

    public function setRole(string $role)
    {
        $this->role = $role;
    }

    public function getRole(): string
    {
        return $this->role;
    }

    public function getId(): int
    {
        return $this->id;
    }
}
