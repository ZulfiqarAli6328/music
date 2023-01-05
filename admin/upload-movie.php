    <?php
    session_start();
    $con = mysqli_connect('localhost', 'root', '', 'music_db');

    if (isset($_POST['add'])) {
        $song_title = $_POST['song_title'];
        $desc = $_POST['description'];
        $date = $_POST['date'];
        $genre = $_POST['genre'];
        $artist_name = $_POST['artist_name'];

        // thumbnail Directory
        $dir = "assets/thumbnails/";
        $image_name = basename($_FILES['image']['name']);
        $up = move_uploaded_file($_FILES['image']['tmp_name'], $dir . $image_name);

        // Trailer Directory
        $t_dir = "assets/trailers/";
        $t_name = basename($_FILES['music']['name']);
        $t_up = move_uploaded_file($_FILES['music']['tmp_name'], $t_dir . $t_name);

        $upload = $up . $t_up;


        $upload = true;
        if ($upload) {
            $q = "INSERT into `uploads` values(null,'$genre','$song_title','$artist_name','$desc','$t_name','$image_name','$date')";
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
        <title>Upload Movie &mdash; Admin</title>
        <?php include 'shared/styles.php' ?>
    </head>

    <body class="layout-4">
        <!-- Page Loader
    <div class="page-loader-wrapper">
        <span class="loader"><span class="loader-inner"></span></span>
    </div> -->
        <div id="app">
            <div class="main-wrapper main-wrapper-1">

                <?php include 'shared/nav.php' ?>

                <?php include 'shared/sidebar.php' ?>


                <!-- Start app main Content -->
                <div class="main-content">
                    <section class="section">
                        <div class="section-header">
                            <h1>Upload Movie</h1>
                        </div>


                        <div class="section-body">
                            <?php
                            if (@$res) {
                            ?>
                                <div class="alert alert-success">
                                    Movie Uploaded Successfully!
                                </div>
                            <?php
                            }
                            ?>
                            <div class="card">
                                <div class="card-body">
                                    <form action="" method="POST" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <span>Song Title</span>
                                                <input type="text" name="song_title" id="" class="form-control" required>
                                            </div>
                                            <div class="col-sm-6">
                                                <span>Artist Name</span>
                                                <input type="text" name="artist_name" id="" class="form-control" required>
                                            </div>
                                            <div class="col-sm-12 mt-3">
                                                <span>Song Description</span>
                                                <textarea name="description" id="" class="form-control" cols="30" rows="10" required></textarea>
                                            </div>
                                            <div class="col-sm-6 mt-3">
                                                <span>Genre</span>
                                                <select name="genre" id="" class="form-control">
                                                    <option value="">SELECT Genre</option>
                                                    <?php
                                                    $q = "SELECT *  from `genres`";
                                                    $res = mysqli_query($con, $q);
                                                    while ($row = mysqli_fetch_assoc($res)) {
                                                    ?>
                                                        <option value="<?= $row['id'] ?>"><?= $row['genre'] ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="col-sm-6 mt-3">
                                                <span>Release Date</span>
                                                <input type="text" name="date" min="0" id="" class="form-control" required>
                                            </div>

                                            <div class="col-sm-6 mt-3">
                                                <span>Thumbnail</span>
                                                <input type="file" name="image" min="0" id="" accept="image/*" class="form-control" required>
                                            </div>

                                            <div class="col-sm-6 mt-3">
                                                <span>Music file</span>
                                                <input type="file" name="music" min="0" accept="video/*" class="form-control" required>
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