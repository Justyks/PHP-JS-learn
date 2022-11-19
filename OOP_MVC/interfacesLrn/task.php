<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once 'iUser.php';
require_once 'IEmployee.php';
require_once 'IProgrammer.php';
require_once 'Employee.php';
require_once 'Programmer.php';
require_once 'User.php';


$user= new Programmer('roger',53,1000);
echo $user->getSalary();
$user->addLang('PHP');
var_dump($user->getLangs());