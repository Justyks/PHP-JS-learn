<?php

class Circle implements Figure
{
    private $radius;
    const PI = 3.14;

    public function __construct($radius)
    {
        $this->radius = $radius;
    }

    public function getSquare()
    {
        return self::PI * pow($this->radius, 2);
    }

    public function getPerimeter()
    {
        return 2 * self::PI * $this->radius;
    }
}
