<?php
session_start();
 $link = mysqli_connect('localhost', 'root', '', 'music_db');
$user_id = $_GET['id'];
$q = "DELETE from `upload_trailers` where id = $user_id";
$res = mysqli_query($link,$q);

if($res)
{
    ?>
                        <div class="alert alert-success">Movie Deleted Successfully</div>
                    <?php
    header("location: list-movies.php");
    die;
}

else    
{
    ?>
    <div class="alert alert-danger">Something Went Wrong! Please Try again</div>
<?php
    
}
?>  