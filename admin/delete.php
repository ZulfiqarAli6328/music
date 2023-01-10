<?php
session_start();
 $link = mysqli_connect('localhost', 'root', '', 'music_db');
$genre_id = $_GET['id'];
$q = "DELETE from `genres` where id = $genre_id";
$res = mysqli_query($link,$q);

if($res)
{
    ?>
                        
                    <?php
    header("location: list-genres.php");
    die;
}

else    
{
    ?>
    
<?php
    
}
?>  