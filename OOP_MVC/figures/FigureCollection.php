<?php

class FigureCollection
{
    private $figures=[];

    public function add(Figure $figure)
    {
        $this->figures[] = $figure;
    }

    public function getTotalSquare()
    {
        $sum=0;
        foreach($this->figures as $figure)
        {
            $sum+=$figure->getSquare();
        }
        return $sum;
    }
}