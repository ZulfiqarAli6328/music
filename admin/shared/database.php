<?php
    $con = mysqli_connect('localhost', 'root', '', 'music_db');
    if($con){
        echo "<script>console.log('connected')</script>";
    }else{
        die('Database error');
    }
?>