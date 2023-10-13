<?php

namespace App\Models;

use App\Contracts\BaseModel;

class Word implements BaseModel
{
    private int $id;
    private string $name;
    private int $level;
    private string $tip;

    public function __construct(string $name, int $level, string $tip)
    {
        $this->name = $name;
        $this->level = $level;
        $this->tip = $tip;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name)
    {
        $this->name = $name;
    }

    public function getLevel(): int
    {
        return $this->level;
    }

    public function setLevel(int $level)
    {
        $this->level = $level;
    }

    public function getTip(): string
    {
        return $this->tip;
    }

    public function setTip(string $tip)
    {
        $this->tip = $tip;
    }

    public function getId(): int
    {
        return $this->id;
    }
}
