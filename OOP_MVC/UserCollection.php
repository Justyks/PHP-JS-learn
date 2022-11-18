<?php
class UserCollection{
    private $students=[];
    private $employees=[];

    public function addUser($newUser){
        if($newUser instanceof Student){
            $this->students[]=$newUser;
        }
        if($newUser instanceof Employee){
            $this->employees[]=$newUser;
        }
    }

    public function showUsers(){
        return array_merge($this->students,$this->employees);
    }

    public function showStudents(){
        return $this->students;
    }

    public function showEmployees(){
        return $this->employees;
    }

    public function getTotalSalary(){
        $sum=0;
        foreach($this->employees as $employee){
            $sum+=$employee->getSalary();
        }
        return $sum;
    }

    public function getTotalScholarship(){
        $sum=0;
        foreach($this->students as $student){
            $sum+=$student->getScholarship();
        }
        return $sum;
    }
    
    public function getTotalPayment(){
        $sum=0;
        foreach($this->students as $student){
            $sum+=$student->getScholarship();
        }
        foreach($this->employees as $employee){
            $sum+=$employee->getSalary();
        }
        return $sum;
    }
}
?>