<?php
session_start();
include "shared/database.php";
$id = $_GET['id'];
    $query = "SELECT * from `uploads` where `id`=" .$id;
    $res = mysqli_query($con,$query);
    $user = mysqli_fetch_assoc($res);
 
    if(isset($_POST['changes'])){
        
        $musicname = $_POST['musicname'];
        $phone = $_POST['phone'];
        
        $artist = $_POST['artist'];
        $descrip = $_POST['descrip'];
        $dir = "assets/musicphoto/";
        $image_name = basename($_FILES['musicbanner']['name']);
            $up = move_uploaded_file($_FILES['musicbanner']["tmp_name"], $dir.$image_name);
    
            $dir2 = "assets/music/";
            $music_name = basename($_FILES['audio']['name']);
            $up = move_uploaded_file($_FILES['audio']["tmp_name"], $dir2.$music_name);
    

       $q = "UPDATE `uploads` set `title` = '$musicname', `description` = '$descrip',`cover_image` = '$image_name' ,`music` = '$music_name' ,`artist` = '$artist' where `id` = '$id'";
        $res = mysqli_query($con, $q);
        
        if($res){
            header('location: list-music.php');
            die;
        }
        else{
            echo '<script>alert("Passwords do not match")</script>';
        }
    }
    
?>
<!DOCTYPE html>
<html lang="en">

<!-- features-profile.html  Tue, 07 Jan 2020 03:35:31 GMT -->
<head>
<meta charset="UTF-8">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
<title>Profile &mdash; CodiePie</title>

<!-- General CSS Files -->
<?php include "shared/styles.php"?>
<link rel="stylesheet" href="assets/modules/bootstrap-social/bootstrap-social.css">
<link rel="stylesheet" href="assets/modules/summernote/summernote-bs4.css">
</head>

<body class="layout-4">
<!-- Page Loader -->

    <div class="main-wrapper main-wrapper-1">
        <div class="navbar-bg"></div>

        <!-- Start app top navbar -->
        <?php include "shared/nav.php"?>

        <!-- Start main left sidebar menu -->
        <?php include "shared/sidebar.php"?>

        <!-- Start app main Content -->
        <div class="main-content">
            <section class="section">
                <div class="section-header">
                    <h1>Profile</h1>
                    <div class="section-header-breadcrumb">
                        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                        <div class="breadcrumb-item">Profile</div>
                    </div>
                    <?php
                    $q = "SELECT * from `uploads` where `id` = '$id'";
                    $res = mysqli_query($con, $q);
                    $row = mysqli_fetch_assoc($res);
                    ?>
                </div>
                
                        <div class="col-12 col-md-12 col-lg-7">
                            <div class="card">
                                <form method="post"  enctype="multipart/form-data">
                                    <div class="card-header">
                                        <h4>Edit Profile</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="form-group col-md-6 col-12">
                                                <label>Music name</label>
                                                <input type="text" class="form-control" name="musicname" value="<?php echo $row['title']?>" pattern="[A-Za-z ]{3,256}" required>
                                                
                                            </div>
                                            <div class="form-group col-md-6 col-12">
                                                <label>Music artist</label>
                                                <input type="text" class="form-control" name="artist" value="<?php echo $row['artist']?>" required>
                                                
                                            </div>
                                        </div>
                                        
                                            <div class="form-group  col-12">
                                                <label>Music banner</label>
                                                <input type="file" class="form-control mb-4" name="musicbanner" accept="image/*" required>
                                                
                                                    
                                               
                                            </div>
                                            <div class="form-group  col-12">
                                                <label>Music</label>
                                                <input type="file" class="form-control mb-4" name="audio" accept="audio/*" required>
                                                
                                                    
                                               
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-12">
                                                <label>Description</label>
                                                <textarea class="form-control summernote-simple" name="descrip"><?php echo $row['description']?></textarea>
                                            </div>
                                        </div>
                                      
                                    </div>
                                    <div class="card-footer text-right">
                                        <button class="btn btn-primary" name="changes">Save Changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <!-- Start app Footer part -->
        <?php include "shared/footer.php"?>
    </div>
</div>

<!-- General JS Scripts -->
<?php include "shared/scripts.php"?>
<script src="assets/modules/summernote/summernote-bs4.js"></script>
</body>

<!-- features-profile.html  Tue, 07 Jan 2020 03:35:33 GMT -->
</html>