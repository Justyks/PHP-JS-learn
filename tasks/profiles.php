<?php
    header("Content-Type: text/html; charset=utf-8");
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    date_default_timezone_set('Europe/Minsk');
    session_start();
    if(!$connect=mysqli_connect('localhost','root','root','testik')){
        die($connect);
        echo "Can\'t connect to database";
     }
    if(isset($_GET['id'])){
        $query="SELECT login,dateOfRegistration FROM users WHERE id=$_GET[id]";
        $result=mysqli_query($connect,$query);
        $row=mysqli_fetch_assoc($result);
        if($row){
            echo "$row[login]    $row[dateOfRegistration]";
        }else{
            echo 'no users with this id';
        }
        
    }
    $query="SELECT id FROM users";
    $result=mysqli_query($connect,$query);
    while($row=mysqli_fetch_assoc($result)):
?>
<p><a href="?id=<?=$row['id']?>"><?=$row['id']?></a></p>

<?php endwhile; ?>