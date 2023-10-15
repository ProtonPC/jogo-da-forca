<?php

namespace App\Models;

use App\Contracts\BaseModel;

class User implements BaseModel
{
    private int $id;
    private string $name;
    private string $userName;
    private string $password;

    public function __construct(string $name, string $password)
    {
        $this->name = $name;
        $this->password = $password;
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

    public function getId(): int
    {
        return $this->id;
    }

    public function getPassword(): string
    {
        return md5($this->password);
    }

    public function setPassord(string $password): void
    {
        $this->password = $password;
    }
}
