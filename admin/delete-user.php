<?php
session_start();
 $link = mysqli_connect('localhost', 'root', '', 'music_db');
$user_id = $_GET['id'];
$q = "DELETE from `users` where id = $user_id";
$res = mysqli_query($link,$q);

if($res)
{
    ?>
                        
                    <?php
    header("location: list-users.php");
    die;
}

else    
{
    ?>
    
<?php
    
}
?>  