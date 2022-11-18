<?php
class Cart
{
    private $products = [];

    public function showCart()
    {
        return $this->products;
    }

    public function addProduct($product)
    {
        if (!$this->exists($product)) {
            $this->products[] = $product;
        }
    }

    public function removeProduct($name)
    {

        foreach ($this->products as $product) {
            if ($name == $product->getName()) {
                $findedProduct = $product;
            }
        }
        array_splice($this->products, array_search($findedProduct, $this->products), 1);
    }

    public function getTotalCost()
    {
        $sum = 0;
        foreach ($this->products as $product) {
            $sum += $product->getCost();
        }
        return $sum;
    }

    public function getTotalQuantity()
    {
        $sum = 0;
        foreach ($this->products as $product) {
            $sum += $product->getQuantity();
        }
        return $sum;
    }

    public function getAvgPrice()
    {
        return $this->getTotalCost() / $this->getTotalQuantity();
    }

    private function exists($newProduct)
    {
        // foreach ($this->products as $product) {
        //     if ($product == $newProduct) {
        //         return true;
        //     }
        //     return false;
        // }
        return in_array($newProduct,$this->products);
    }
}
