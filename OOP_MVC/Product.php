<?php

class Product{

    protected $name;
    protected $price;
    protected $quantity;

    public function __construct($name,$price,$quantity)
    {
        $this->name=$name;
        $this->price=$price;
        $this->quantity=$quantity;
    }

    public function getName(){
        return $this->name;
    }
    
    public function getPrice(){
        return $this->price;
    }
    
    public function getQuantity(){
        return $this->quantity;
    }

    
    public function getCost(){
        return $this->price * $this->quantity;
    }
}

?>