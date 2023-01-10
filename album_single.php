<?php
session_start();
error_reporting(0);
$user = $_SESSION['user_id'];
$movie_id = $_GET['id'];
$link = mysqli_connect('localhost', 'root', '', 'music_db');
$q = "SELECT *  from `uploads` where id =" . $_GET['id'];
$res = mysqli_query($link, $q);
$row = mysqli_fetch_assoc($res);
?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- Begin Head -->
<head>
    <title>Miraculous - Online Music Store Html Template</title>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="description" content="Music">
    <meta name="keywords" content="">
    <meta name="author" content="kamleshyadav">
    <meta name="MobileOptimized" content="320">
    <!--Start Style -->
    <link rel="stylesheet" type="text/css" href="css/fonts.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="js/plugins/swiper/css/swiper.min.css">
    <link rel="stylesheet" type="text/css" href="js/plugins/nice_select/nice-select.css">
    <link rel="stylesheet" type="text/css" href="js/plugins/player/volume.css">
	<link rel="stylesheet" type="text/css" href="js/plugins/scroll/jquery.mCustomScrollbar.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <!-- Favicon Link -->
    <link rel="shortcut icon" type="image/png" href="images/favicon.png">
</head>

<body>
	<!----Loader---->
	<div class="ms_inner_loader">
		<div class="ms_loader">
			<div class="ms_bars">
				<div class="bar"></div>				
				<div class="bar"></div>
				<div class="bar"></div>
				<div class="bar"></div>
				<div class="bar"></div>
				<div class="bar"></div>
				<div class="bar"></div>
				<div class="bar"></div>
				<div class="bar"></div>
				<div class="bar"></div>
			</div>
		</div>
	</div>
    <!----Main Wrapper Start---->
    <div class="ms_main_wrapper">
        <!---Header--->
<?php include "shared/header.php"?>
        <!---Side Menu Start--->
 <?php include "shared/sidebar.php"?>
        <!----Album Single Section Start---->
        <div class="ms_album_single_wrapper">
            <div class="album_single_data">
                <div class="album_single_img">
                    <img src="admin/assets/musicphoto/<?= $row["cover_image"] ?>" style="height: 200px; width: 200px;" alt="" class="img-fluid">
            
                </div>
                <div class="album_single_text">
                    <h2><?= $row['title']?></h2>
                    <p class="singer_name"><?= $row['artist']?></p>
                    <div class="album_feature">
                        <a href="#" class="album_date">5 song | 25:10</a>
                        <a href="#" class="album_date">Released <?= $row['song_title']?>  | Abc Music Company</a>
                    </div>
                    <div class="album_btn">
                        <a href="admin/assets/trailers/<?= $row["trailer"]?>" class="ms_btn play_btn"><span class="play_all"><img src="images/svg/play_all.svg" alt="">Playn </span><span class="pause_all"><img src="images/svg/pause_all.svg" alt="">Pause</span></a>
                    </div>
                </div>
                <div class="album_more_optn ms_more_icon">
                    <span><img src="images/svg/more.svg" alt=""></span>
            </div>
            </div>
            <!----Song List---->

			<div class="album_inner_list">
				<div class="album_list_wrapper">
                <?php
                        $link = mysqli_connect('localhost', 'root', '', 'music_db');
                        $q = "SELECT *  from `uploads`";
                        $res = mysqli_query($link, $q);
                        while ($row = mysqli_fetch_assoc($res)) {
                        ?>
					<ul class="album_list_name">
						<li>#</li>
						<li>Song Title</li>
						<li>Artist</li>
					</ul>
					<ul>
						<li><a href="#"><span class="play_no"><?= $row['title']?></span><span class="play_hover"></span></a></li>
						<li><a href="#"><?= $row['title']?></a></li>
						<li><a href="#"><?= $row['artist']?></a></li>
					</ul>
<?php
}
?>
				</div>
			</div>
        </div>
        <!---Main Content Start--->
        <div class="ms_content_wrapper ms_album_content">
            <!----Testimonial section Start---->
            <div class="ms_test_wrapper">
                <div class="ms_heading">
                    <h1>comments (5)</h1>
                </div>
                <div class="ms_test_slider swiper-container">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="ms_test_box">
                                <div class="ms_test_top">
                                    <div class="ms_test_img">
                                        <img src="images/user1.jpg" alt="">
                                    </div>
                                    <div class="ms_test_name">
                                        <h3>Frank Adler</h3>
                                        <span class="cmnt_time">10 Minutes Ago</span>
                                    </div>
                                </div>
                                <div class="ms_test_para">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat duis aute irure dolor.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Add Arrows -->
                <div class="swiper-button-next1 slider_nav_next"></div>
                <div class="swiper-button-prev1 slider_nav_prev"></div>
            </div>
            <!----Comment Form section Start---->
            <div class="ms_cmnt_wrapper">
                <div class="ms_heading">
                    <h1>Leave A Comment</h1>
                </div>
                <div class="ms_cmnt_form">
                    <form>
                        <div class="ms_input_group">
                            <div class="ms_input">
                                <input type="text" class="form-control" placeholder="Enter Your Name Here..">
                            </div>
                            <div class="ms_input marger_top20">
                                <input type="text" class="form-control" placeholder="Enter Your Email Here..">
                            </div>
                        </div>
                        <div class="ms_input_group1">
                            <div class="ms_input">
                                <textarea name="message" class="form-control" placeholder="Enter Your Comment Here.."></textarea>
                            </div>
                        </div>
                        <div class="ms_input_group2">
                            <div class="ms_input">
                                <button class="ms_btn">post your comment</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!----Main div close---->
        </div>
        <!----Footer Start---->
<?php include "shared/footer.php"?>

    <!--Main js file Style-->
<?php include "shared/scripts.php" ?>
</body>


</html>