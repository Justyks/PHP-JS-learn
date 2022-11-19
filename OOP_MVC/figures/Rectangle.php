<?php

class Rectangle implements Figure
{
    private $a;
    private $b;

    public function __construct($a,$b)
    {
        $this->a=$a;
        $this->b=$b;
    }

    public function getSquare()
    {
        return 2 * $this->a * $this->b;
    }

    public function getPerimeter()
    {
        return $this->a * 2 + $this->b * 2;
    }
}