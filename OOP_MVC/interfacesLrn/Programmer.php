<?php

class Programmer extends Employee implements IProgrammer
{
    private $langs=[];

    public function addLang($lang)
    {
        $this->langs[]=$lang;
    }

    public function getLangs()
    {
        return $this->langs;
    }
}