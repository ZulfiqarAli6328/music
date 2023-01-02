<?php
$con = mysqli_connect("localhost","root","","sound");

if($con){
    echo "<script>console.log('connected');</script>";
}

?>