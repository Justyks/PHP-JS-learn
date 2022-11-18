<?php
    session_start();
    $users=$_SESSION['users'];
    print_r($users);
    foreach($users as $user):
?>
<a href="tasks.php?show=<?=$user['id']?>"><?=$user['name']?></a>
<?php endforeach;?>