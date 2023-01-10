<?php
session_start();
$link = mysqli_connect("localhost","root","","music_db");

if(isset($_POST['create']))
{
    $name = $_POST['genre'];
    $descrip = $_POST['description'];
    $genre_id = $_POST['genre_id'];
    $artist = $_POST['artist'];
    $dir = "assets/musicphoto/";
    $image_name = basename($_FILES['image']['name']);
        $up = move_uploaded_file($_FILES['image']["tmp_name"], $dir.$image_name);

        $dir2 = "assets/music/";
        $music_name = basename($_FILES['addmusic']['name']);
        $up = move_uploaded_file($_FILES['addmusic']["tmp_name"], $dir2.$music_name);



    $q = "INSERT into `uploads` values(null,'$name','$genre_id','$artist','$descrip','$image_name','$music_name')";
    $res = mysqli_query($link,$q);
    }
    if(@$res)
        header("location:list-music.php");
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
                                        <input type="text" class="form-control" placeholder="Music Name" name="genre" pattern="[A-Za-z ]{3,50}" id="" required>
                                    </div>    
                                    <div class="col-sm-12 mt-3">
                                        <input type="text" class="form-control" placeholder="artist Name" name="artist" pattern="[A-Za-z ]{3,50}" id="" required>
                                    </div>       
                                    <div class="col-sm-12 mt-3">
                                        <input type="text" class="form-control" placeholder="Description" name="description" pattern="[A-Za-z ]{3,50}" id="" required>
                                    </div>  

                                    <div class="col-sm-12 mt-3">
            <label for="select">select genre</label>
            <div class="row">
        <select class="form-select mb-4" id="select" name="genre_id">
        <?php
                                                    $q = "SELECT *  from `genres`";
                                                    $res = mysqli_query($link, $q);
                                                    while($row = mysqli_fetch_assoc($res)){
                                                        ?>
                                                        <option value="<?=$row['id']?>"><?=$row['genre']?></option>
                                                        <?php
                                                    }
                                                ?>
        </select>
        </div>
        </div>
                                    <div class="col-sm-12 mt-3">
                                        <label for="" >cover photo</label>
                                        <input type="file" class="form-control"  name="image" accept="image/*" required>
                                    </div> 
                                    <div class="col-sm-12 mt-3">
                                        <label for="" >Add music</label>
                                        <input type="file" class="form-control"  name="addmusic" accept="audio/*"  required>
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
