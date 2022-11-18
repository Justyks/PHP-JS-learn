<?php
class Programmer extends Employee
{
    private $langs = [];

    public function setLangs($lang)
    {
        $this->langs[] = $lang;
    }
    
    public function pushLangs($langs)
    {
        $this->langs[] = array_merge($this->langs, $langs);
    }

    public function getLangs()
    {
        return $this->langs;
    }

    public function addAge()
    {
        $this->age++;
    }
}
