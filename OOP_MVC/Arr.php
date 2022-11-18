<?php
class Arr
{
    protected $numbers = [];
    private $sumHelper;

    public function __construct()
    {
        $this->sumHelper=new SumHelper;
    }

    public function add($number)
    {
        $this->numbers[] = $number;
        return $this;
    }

    public function getSum23(){
        $arr=$this->numbers;
        return $this->sumHelper->getSum2($arr)+$this->sumHelper->getSum3($arr);
    }

    public function push($numbers)
    {
        $this->numbers = array_merge($this->numbers, $numbers);
        return $this;
    }

    public function getSum()
    {
        return array_sum($this->numbers);
    }
}
