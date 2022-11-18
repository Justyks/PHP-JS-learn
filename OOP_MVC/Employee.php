<?php


class Employee extends User
{
    protected $salary;
    protected $post;

    public function __construct($name, $age, Post $post)
    {
        parent::__construct($name, $age);
        $this->post = $post;
    }

    public function setAge($age)
    {
        if ($age <= 25) {
            parent::setAge($age);
        }
    }

    public function setName($name)
    {
        if (strlen($name) <= 10) {
            parent::setName($name);
        }
    }

    public function getSalary()
    {
        return $this->post->getSalary();
    }

    public function getPost()
    {
        return $this->post->getPost();
    }

    public function changePost(Post $post)
    {
        $this->post = $post;
    }

    public function increaseRevenue($value){
        $this->post->setSalary($this->post->getSalary()+$value);
    }
}

?>