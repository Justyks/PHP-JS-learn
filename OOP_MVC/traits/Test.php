<?php

class Test
{
    use Trait1, Trait2, Trait3
    {
        Trait3::changeAccess as public;
        Trait1::method insteadof Trait2, Trait3;
        Trait1::method as method1;
        Trait2::method as method2;
        Trait3::method as method3;
    }

    private $prop1=2;
    private $prop2=3;

    public function getSum()
    {
        return $this->method1() + $this->method2() +$this->method3();
    }

    public function abFunc()
    {
        return 56;
    }

    public function __get($name)
    {
        return $this->$name;
    }

    public function __set($name, $value)
    {
        if(property_exists('Test',$name))
        {
            $this->$name=$value;
            return 'OK';
        }
    }
}