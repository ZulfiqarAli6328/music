<?php
    $con = mysqli_connect('localhost', 'root', '', 'ticket-booking');
    if($con){
        echo "<script>console.log('connected')</script>";
    }else{
        die('Database error');
    }
?>