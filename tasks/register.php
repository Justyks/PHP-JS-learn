<?php

 if(!$connect=mysqli_connect('localhost','root','root','testik')){
    die($connect);
    echo "Can\'t connect to database";
 }
 session_start();
 date_default_timezone_set('Europe/Minsk');
 if(isset($_POST['ok'])){
    if(!empty($_POST['login'])&&!empty($_POST['password'])&& !empty($_POST['confirm'])){
        $email=$_POST['email'];
        $password=$_POST['password'];
        $login=$_POST['login'];
        $dateOfRegistration=date('Y-m-d',time());
        
        if(filter_var($email,FILTER_VALIDATE_EMAIL)){

            if ($_POST['password'] == $_POST['confirm']) {

                if(preg_match('#[^a-z0-9]#',$login)==0 && strlen($login)>=4 && strlen($login)<=10){

                    if(strlen($password)>=6 && strlen($password)<=12){
                    $password=password_hash($password,PASSWORD_DEFAULT);   
                    $query="SELECT login FROM users WHERE login='$login'";
                    $result=mysqli_query($connect,$query);
                    $user=mysqli_fetch_assoc($result);

                        if(empty($user)){

                            $query="INSERT INTO users SET login='$login', password='$password', dateOfRegistration='$dateOfRegistration',email='$email',status_id='1'";
                            $result=mysqli_query($connect,$query) or die(mysqli_error($connect));

                            $_SESSION['auth']=true;
                            $_SESSION['id']=mysqli_insert_id($connect);
                            $_SESSION['login']=$login;
                            $_SESSION['status']='user';

                            header('Location:showUsers.php');

                        }else{
                            echo "your login isn't free";
                        }
                    }else{
                        echo 'password must be from 6 to 12 characters';
                    }
                }else{
                    echo 'login must contain only Latin characters or numbers, and length must be from 4 to 10 characters';
                }    
            }else{
                echo "your passwords don't match";
            }
        }else{
            echo "invalid email";
        }
    }else{
        echo 'fields must be filled';
    }
}



?>
<form action="" method="POST">
	<input name="login" value="<?=$_POST['login']?>">
    <input type="email" name="email">
	<input type="password" name="password" value="<?=$_POST['password']?>">
    <input type="password" name="confirm">
	<input type="submit" name='ok'>
</form>