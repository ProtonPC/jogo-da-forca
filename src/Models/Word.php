<?php

class Word
{
    private $name;
    private $level;
    private $tip;

    public function Word($name, $level, $tip)
    {
        $this->name = $name;
        $this->level = $level;
        $this->tip = $tip;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name){
        $this->name = $name;
    }

    public function getLevel()
    {
        return $this->level;
    }

    public function setLevel($level)
    {
        $this->level = $level;
    }

    public function getTip()
    {
        return $this->tip;
    }

    public function setTip($tip)
    {
        $this->tip = $tip;
    }
}