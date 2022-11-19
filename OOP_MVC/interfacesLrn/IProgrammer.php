<?php

interface IProgrammer
{
    public function __construct($name,$age, $salary);
    public function getName();
    public function getSalary();
    public function getLangs();
    public function addLang($lang);
}