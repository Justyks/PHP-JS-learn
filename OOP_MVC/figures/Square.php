<?php

class Square extends Figure
{
    private $a;

    public function __construct($a)
    {
        $this->a=$a;
    }

    public function getSquare()
    {
        return pow($this->a,2);
    }

    public function getPerimeter()
    {
        return 4 * $this->a;
    }
}