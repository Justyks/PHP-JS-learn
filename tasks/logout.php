<?php
    session_start();
    $_SESSION['auth']=null;
    $_SESSION['logout']=true;
    $_SESSION['id']=null;
    header('Location:showUsers.php');

?>