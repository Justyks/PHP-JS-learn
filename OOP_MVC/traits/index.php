<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once 'Helper.php';
require_once 'Trait1.php';
require_once 'Trait2.php';
require_once 'Trait3.php';

require_once 'Country.php';
require_once 'Test.php';


// $belarus=new Country('Belarus',27, 9000000);
// echo $belarus;

$test= new Test;
echo $test->getSum();
$test->prop3=5;
