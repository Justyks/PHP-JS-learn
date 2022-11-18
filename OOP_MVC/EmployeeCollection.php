<?php

class EmployeeCollection{
    private $employees=[];

    public function add(Employee $employee){
        $this->employees[]=$employee;
    }

    public function getTotalSalary(){
        $sum=0;
        foreach ($this->employees as $employee){
            $sum+=$employee->getSalary();
        }
        return $sum;
    }
}

?>