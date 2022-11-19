<?php

class Employee implements IEmployee
{
    private $name;
    private $age;
    private $salary;

    public function __construct($name,$age,$salary)
    {
        $this->name=$name;
        $this->age=$age;
        $this->salary=$salary;
    }

    public function setName($name)
    {
        $this->name=$name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setAge($age)
    {
        $this->age=$age;
    }

    public function getAge()
    {
        return $this->age;
    }

    public function setSalary($salary)
    {
        $this->salary=$salary;
    }

    public function getSalary()
    {
        return $this->salary;
    }
}