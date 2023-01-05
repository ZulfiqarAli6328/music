<?php
session_start();
 $link = mysqli_connect('localhost', 'root', '', 'music_db');
$user_id = $_GET['id'];
$q = "DELETE from `genre` where id = $user_id";
$res = mysqli_query($link,$q);

if($res)
{
    ?>
                        <div class="alert alert-success">Category Deleted Successfully</div>
                    <?php
    header("location: list-category.php");
    die;
}

else    
{
    ?>
    <div class="alert alert-danger">Something Went Wrong! Please Try again</div>
<?php
    
}
?>  