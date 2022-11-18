<?php
require_once 'Figure.php';
require_once 'Square.php';
require_once 'Rectangle.php';

$rectangle= new Rectangle(2,3);
echo $rectangle->getSquare();
echo $rectangle->getRatio();