<?php

interface IEmployee extends IUser
{
    public function __construct($name,$age,$salary);
    public function setSalary($salary);
    public function getSalary();
}