<?php
session_start();
    $con = mysqli_connect('localhost', 'root', '', 'music_db');
    $id = $_GET['id'];
    $query = "SELECT * from `uploads` where `id`=" .$id;
    $res = mysqli_query($con,$query);
    $user = mysqli_fetch_assoc($res);

if(isset($_POST['add'])){
    $movie_name = $_POST['movie_name'];
    $desc = $_POST['description'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $category = $_POST['category'];
    $theatre = $_POST['theatre'];
    $r_date = $_POST['release-date'];
    
// Screen Shot 1 Directory
    
   
    $upload = $up1.$up2.$up3.$up4.$up5.$up6.$up7.$up.$t_up ;


    $upload = true;
    if($upload)
    {
        $q = "INSERT into `uploads` values(null,'$movie_name','$desc','$date','$time','$category','$theatre','$image_name','$t_name','$r_date','$S1','$S2','$S3','$S4','$S5','$S6','$banner_name')";
        $res = mysqli_query($con, $q);

    }
   
}
?>

<!DOCTYPE html>
<html lang="en">

<!-- blank.html  Tue, 07 Jan 2020 03:35:42 GMT -->

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Update Movie &mdash; Admin</title>
    <?php include 'shared/styles.php' ?>

</head>

<body class="layout-4">
    Page Loader
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
                        <h1>Update Movie</h1>
                    </div>


                    <div class="section-body">

                        <div class="card">
                            <div class="card-body">
                                <?php
                                 if (@$res) {
                                    ?>
                                        <div class="alert alert-success">
                                            Movie Updated Successfully!
                                        </div>
                                    <?php
                                    header("location: update.php");
                                    die;
                                    }
                                    else 
                                    {
                                    ?>
                                    <div class="alert alert-danger">
                                            Something Went Wrong!
                                        </div>
                                    <?php 
                                    }
                                ?>
                                <form action="" method="POST" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <span>Music Name</span>
                                            <input type="text" name="music_name" id="" value="<?=$user['title']?>" class="form-control" required>
                                        </div>
                                        <div class="col-sm-12 mt-3">
                                        <span>Music Description</span>
                                            <textarea name="description" id="" value="<?=$user['description']?>" class="form-control" cols="30" rows="10" required></textarea>
                                        </div>
                                        <div class="col-sm-6 mt-3">
                                        <span>Movie Category</span>
                                        <select name="category" id="" value="<?=$user['genre_id']?>" class="form-control">
                                                <option value="">SELECT CATEGORY</option>
                                                <?php
                                                    $q = "SELECT *  from `genres`";
                                                    $res = mysqli_query($con, $q);
                                                    while($row = mysqli_fetch_assoc($res)){
                                                        ?>
                                                        <option value="<?=$row['id']?>"><?=$row['category-name']?></option>
                                                        <?php
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                        
                                        <div class="col-sm-6 mt-3">
                                        <span>Music Banner</span>
                                            <input type="file" name="banner" value="<?=$user['cover_image']?>" min="0" id="" accept="image/*" class="form-control" required>
                                        </div>

                                        <div class="col-sm-6 mt-3">
                                        <span>music file</span>
                                            <input type="file" name="trailer" value="<?=$user['music']?>" min="0" accept="audio/*" class="form-control" required>
                                        </div>

                                        
                        
                                        <div class="col-sm-12 mt-3">
                                                <input type="submit" value="upload" class="btn btn-success float-right" name="add">
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

</html>