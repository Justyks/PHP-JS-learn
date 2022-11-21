<?php

class Country
{
    use Helper;

    public function __construct($name,$age,$population)
    {
        $this->name=$name;
        $this->age=$age;
        $this->population=$population;
    }

    public function __toString()
    {
        return $this->name;
    }
}