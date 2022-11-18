<?php

class Post
{
    private $name;
    private $salary;

    public function __construct($name,$salary)
    {
        $this->name=$name;
        $this->salary=$salary;
    }
    public function getPost()
    {
        return $this->name;
    }

    public function getSalary()
    {
        return $this->salary;
    }

    public function setSalary($salary)
    {
        $this->salary=$salary;
    }
}
