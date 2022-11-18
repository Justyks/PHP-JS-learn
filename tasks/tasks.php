<?php
    header("Content-Type: text/html; charset=utf-8");
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    date_default_timezone_set('Europe/Minsk');
    session_start();
    if(!$connect=mysqli_connect('localhost','root','root','testik')){
        die($connect);
        echo 'Can\'t connect to database';
    }
    mysqli_query($connect, "SET NAMES 'utf8'");

    $data=[];
    if(isset($_GET['show'])){
    $result=mysqli_query($connect,"SELECT * FROM users WHERE id=$_GET[show]") or die(mysqli_error($connect));
    $infoAboutUser=mysqli_fetch_assoc($result);
    }
    $result=mysqli_query($connect,"SELECT * FROM users") or die(mysqli_error($connect));
    $users=[];
    while($users[]=mysqli_fetch_assoc($result));
    $_SESSION['users']=$users;
    if(isset($_GET['del'])){
        $result=mysqli_query($connect,"DELETE FROM users WHERE id=$_GET[del]")
        or die(mysqli_error($connect));
    }  
    //$query=mysqli_query($connect,'INSERT INTO users (name,age,salary) VALUE ("user7",26,300)');
    //$query=mysqli_query($connect,'UPDATE users SET age=23 WHERE id>2 and id<5');
    //$query=mysqli_query($connect,'DELETE FROM users ');   

?>
<div>
	<p>
		имя: <span class="name"><?=$infoAboutUser['name']?></span>
	</p>
	<p>
		возраст: <span class="age"><?=$infoAboutUser['age']?></span>,
		зарплата: <span class="salary"><?=$infoAboutUser['salary']?></span>,
	</p>
</div>
<!-- <form action="" method="POST">
    <input name="name">
    <input name="age">
    <input name="salary">
	<input type="submit" name="ok">
</form> -->

    


