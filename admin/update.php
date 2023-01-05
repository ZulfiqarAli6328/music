<?php
session_start();
    $con = mysqli_connect('localhost', 'root', '', 'ticket-booking');
    $id = $_GET['id'];
    $query = "SELECT * from `upload_trailers` where `id`=" .$id;
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
    $dir1 = "assets/screen-shots/";
    $S1 = basename($_FILES['screen-shot1']['name']);
    $up1 = move_uploaded_file($_FILES['screen-shot1']['tmp_name'], $dir1.$S1);
// Screen Shot 2 Directory
    $dir2 = "assets/screen-shots/";
    $S2 = basename($_FILES['screen-shot2']['name']);
    $up2 = move_uploaded_file($_FILES['screen-shot2']['tmp_name'], $dir2.$S2);
// Screen Shot 3 Directory
    $dir3 = "assets/screen-shots/";
    $S3 = basename($_FILES['screen-shot3']['name']);
    $up3 = move_uploaded_file($_FILES['screen-shot3']['tmp_name'], $dir3.$S3);
// Screen Shot 4 Directory
    $dir4 = "assets/screen-shots/";
    $S4 = basename($_FILES['screen-shot4']['name']);
    $up4 = move_uploaded_file($_FILES['screen-shot4']['tmp_name'], $dir4.$S4);
// Screen Shot 5 Directory
    $dir5 = "assets/screen-shots/";
    $S5 = basename($_FILES['screen-shot5']['name']);
    $up5 = move_uploaded_file($_FILES['screen-shot5']['tmp_name'], $dir5.$S5);
// Screen Shot 6 Directory
    $dir6 = "assets/screen-shots/";
    $S6 = basename($_FILES['screen-shot6']['name']);
    $up6 = move_uploaded_file($_FILES['screen-shot6']['tmp_name'], $dir6.$S6);
    
// thumbnail Directory
    $dir = "assets/thumbnails/";
    $image_name = basename($_FILES['image']['name']);
    $up = move_uploaded_file($_FILES['image']['tmp_name'], $dir.$image_name);

// Movie Banner Directory
    $banner_dir = "assets/banners/";
    $banner_name = basename($_FILES['banner']['name']);
    $up7 = move_uploaded_file($_FILES['banner']['tmp_name'], $banner_dir.$banner_name);

// Trailer Directory
    $t_dir = "assets/trailers/";
    $t_name = basename($_FILES['trailer']['name']);
    $t_up = move_uploaded_file($_FILES['trailer']['tmp_name'], $t_dir.$t_name);
   
    $upload = $up1.$up2.$up3.$up4.$up5.$up6.$up7.$up.$t_up ;


    $upload = true;
    if($upload)
    {
        $q = "INSERT into `upload_trailers` values(null,'$movie_name','$desc','$date','$time','$category','$theatre','$image_name','$t_name','$r_date','$S1','$S2','$S3','$S4','$S5','$S6','$banner_name')";
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
                                            <span>Movie Name</span>
                                            <input type="text" name="movie_name" id="" value="<?=$user['movie_name']?>" class="form-control" required>
                                        </div>
                                        <div class="col-sm-12 mt-3">
                                        <span>Movie Description</span>
                                            <textarea name="description" id="" value="<?=$user['description']?>" class="form-control" cols="30" rows="10" required></textarea>
                                        </div>
                                        <div class="col-sm-6 mt-3">
                                        <span>Movie Category</span>
                                        <select name="category" id="" value="<?=$user['category']?>" class="form-control">
                                                <option value="">SELECT CATEGORY</option>
                                                <?php
                                                    $q = "SELECT *  from `categories`";
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
                                        <span>Theatre id</span>
                                        <select name="theatre" value="<?=$user['theatre']?>" class="form-control" required >
                                            
                                        <option value="">SELECT THEATRES</option>
                                                <?php
                                                    $q = "SELECT *  from `theatres`";
                                                    $res = mysqli_query($con, $q);
                                                    while($row = mysqli_fetch_assoc($res)){
                                                        ?>
                                                        <option value="<?=$row['id']?>"><?=$row['theatre-name']?></option>
                                                        <?php
                                                    }
                                                ?>
                                         </select>
                                        </div>

                                        <div class="col-sm-6 mt-3">
                                        <span>Movie Date</span>
                                            <input type="date" name="date" value="<?=$user['date']?>" min="0"  id="" class="form-control" required>
                                        </div>

                                        <div class="col-sm-6 mt-3">
                                        <span>Movie Time</span>
                                            <input type="time" name="time" value="<?=$user['time']?>" min="0"  id="" class="form-control" required>
                                        </div>

                                         <div class="col-sm-6 mt-3">
                                        <span>Movie Release-date</span>
                                            <input type="date" name="release-date" value="<?=$user['release-date']?>" min="0"  id="" class="form-control" required>
                                        </div>

                                        <div class="col-sm-6 mt-3">
                                        <span>Thumbnail</span>
                                            <input type="file" name="image" value="<?=$user['img']?>" min="0" id="" accept="image/*" class="form-control" required>
                                        </div>

                                        <div class="col-sm-6 mt-3">
                                        <span>Movie Banner</span>
                                            <input type="file" name="banner" value="<?=$user['Movie-banner']?>" min="0" id="" accept="image/*" class="form-control" required>
                                        </div>

                                        <div class="col-sm-6 mt-3">
                                        <span>Trailer file</span>
                                            <input type="file" name="trailer" value="<?=$user['trailer']?>" min="0" accept="video/*" class="form-control" required>
                                        </div>

                                        <div class="col-sm-2 mt-3">
                                        <span>Screen Shots</span>
                                            <input type="file" name="screen-shot1" value="<?=$user['Screen-shot1']?>" min="0" id="" accept="image/*" class="form-control" required>
                                        </div>
                                        <div class="col-sm-2 mt-3">
                                        <span>#2</span>
                                            <input type="file" name="screen-shot2" value="<?=$user['Screen-shot2']?>" min="0" id="" accept="image/*" class="form-control" required>
                                        </div>
                                        <div class="col-sm-2 mt-3">
                                        <span>#3</span>
                                            <input type="file" name="screen-shot3" value="<?=$user['Screen-shot3']?>" min="0" id="" accept="image/*" class="form-control" required>
                                        </div>
                                        <div class="col-sm-2 mt-3">
                                        <span>#4</span>
                                            <input type="file" name="screen-shot4" value="<?=$user['Screen-shot4']?>" min="0" id="" accept="image/*" class="form-control" required>
                                        </div>
                                        <div class="col-sm-2 mt-3">
                                        <span>#5</span>
                                            <input type="file" name="screen-shot5" value="<?=$user['Screen-shot5']?>" min="0" id="" accept="image/*" class="form-control" required>
                                        </div>
                                        <div class="col-sm-2 mt-3">
                                        <span>#6</span>
                                            <input type="file" name="screen-shot6" value="<?=$user['Screen-shot6']?>" min="0" id="" accept="image/*" class="form-control" required>
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