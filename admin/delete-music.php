<?php
session_start();
 $link = mysqli_connect('localhost', 'root', '', 'music_db');
$music_id = $_GET['id'];
$q = "DELETE from `uploads` where id = $music_id";
$res = mysqli_query($link,$q);

if($res)
{
    ?>
                        
                    <?php
    header("location: list-music.php");
    die;
}

else    
{
    ?>
    
<?php
    
}
?>  