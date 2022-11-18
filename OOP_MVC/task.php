<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once 'User.php';
require_once 'Employee.php';
require_once 'SumHelper.php';
require_once 'Arr.php';
require_once 'Programmer.php';
require_once 'Product.php';
require_once 'Cart.php';
require_once 'Student.php';
require_once 'UserCollection.php';
require_once 'EmployeeCollection.php';
require_once 'Post.php';
require_once 'ArraySumHelper.php';
require_once 'Circle.php';

// $programmer= new Programmer('eric',23,424);
// $programmer->setSalary(1000); 
// $programmer->setName('john'); 
// $programmer->setAge(25); 
// $programmer->setLangs('php');
// $programmer->addAge();

// echo $programmer->getSalary(); 
// echo $programmer->getName(); 
// echo $programmer->getAge(); 
// var_dump($programmer->getLangs()); 

// $arr= new Arr;
// $arr->push([3,4]);
// echo $arr->getSum23();
// echo $arr->add(3)->add(4)->push([3,4])->getSum();

// $cheese=new Product('cheese',100,1);
// $milk=new Product('milk',200,1);
// $ice=new Product('ice',50,1);
// $tea=new Product('tea',300,1);

// $cart= new Cart;
// $cart->addProduct($cheese);
// $cart->addProduct($milk);
// $cart->addProduct($ice);
// $cart->addProduct($tea);

// $arr=$cart->showCart();
// foreach ($arr as $product){
//     echo $product->getName();
//     echo "<br>";
// }
// echo "<br>";
// echo "<br>";
// $cart->removeProduct('ice');
// $cart->addProduct($tea);
// $cart->addProduct($tea);
// $arr=$cart->showCart();
// foreach ($arr as $product){
//     echo $product->getName();
//     echo "<br>";
// }

// echo $cart->getTotalCost();
// echo "<br>";
// echo $cart->getTotalQuantity();
// echo "<br>";

// var_dump($tea instanceof Employee);
// $usersCollection = new UserCollection;
	
// $usersCollection->addUser(new Student('kyle', 100));
// $usersCollection->addUser(new Student('luis', 200));

// $usersCollection->addUser(new Employee('john',24, 300));
// $usersCollection->addUser(new Employee('eric',25, 400));

// // Получим полную сумму стипендий:
// echo $usersCollection->getTotalScholarship();

// // Получим полную сумму зарплат:
// echo $usersCollection->getTotalSalary();

// // Получим полную сумму платежей:
// echo $usersCollection->getTotalPayment();

$programmer= new Post('programmer',1000);
$driver= new Post('driver',300);

$employeeProgrammer= new Employee('rodger',23,$programmer);
$employeeProgrammer->changePost($driver);
$employeeProgrammer->increaseRevenue(300);
echo $employeeProgrammer->getName();
echo $employeeProgrammer->getAge();
echo $employeeProgrammer->getSalary();
echo $employeeProgrammer->getPost();

// $arr=[1,2,3];

// echo ArraySumHelper::getSum2($arr);

$circ= new Circle(10);
echo get_class($circ);
?>