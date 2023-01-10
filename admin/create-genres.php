<?php
session_start();
$link = mysqli_connect("localhost","root","","music_db");

if(isset($_POST['create']))
{
    $name = $_POST['genre'];
    $descrip = $_POST['description'];
    $dir = "assets/genresphoto/";
    $image_name = basename($_FILES['image']['name']);
        $up = move_uploaded_file($_FILES['image']["tmp_name"], $dir.$image_name);
    $q = "INSERT into `genres` values(null,'$name','$descrip','$image_name')";
    $res = mysqli_query($link,$q);
    }
    if(@$res)
        header("location:list-genres.php");
?>

<!DOCTYPE html>
<html lang="en">

<!-- blank.html  Tue, 07 Jan 2020 03:35:42 GMT -->
<head>
<meta charset="UTF-8">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
<title>Create Category &mdash; Admin</title>
<?php include 'shared/styles.php' ?>

</head>

<body class="layout-4">
<!-- Page Loader -->
<div class="page-loader-wrapper">
    <span class="loader"><span class="loader-inner"></span></span>
</div>

<div id="app">
    <div class="main-wrapper main-wrapper-1">
        
    <?php include 'shared/nav.php' ?>

<?php include 'shared/sidebar.php' ?>
       

        <!-- Start app main Content -->
        <div class="main-content">
            <section class="section">
                <div class="section-header">
                    <h1>Create Genre</h1>
                </div>
                <div class="section-body">
                    <?php
                     if(@$res)
                     {
                        ?>
                        <div class="alert alert-success">Genre Successfully Added</div>
                    <?php
                     
                    }
                    ?>
                    <div class="card">
                        <div class="card-body">
                            <form action="" method="POST" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" placeholder="Genre Name" name="genre" pattern="[A-Za-z ]{3,50}" id="" required>
                                    </div>          
                                    <div class="col-sm-12 mt-3">
                                        <input type="text" class="form-control" placeholder="Description" name="description" pattern="[A-Za-z ]{3,50}" id="" required>
                                    </div>  
                                    <div class="col-sm-12 mt-3">
                                        <input type="file" class="form-control"  name="image"  required>
                                    </div>            
                            
                                    <div class="col-sm-12 mt-3">
                                        <input type="submit" value="Create" name="create" class="btn btn-success float-right">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>

<?php include 'shared/footer.php' ?>

        
    </div>
</div>

<?php include 'shared/scripts.php' ?>

</body>

<!-- blank.html  Tue, 07 Jan 2020 03:35:42 GMT -->
</html>
