<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once 'Figure.php';
require_once 'Square.php';
require_once 'Rectangle.php';
require_once 'Circle.php';
require_once 'FigureCollection.php';

$circle= new Circle(10);
$collection=new FigureCollection();
$collection->add($circle);
echo $collection->getTotalSquare();
