
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
    <?php include "shared/links.php" ?>
</head>

<body>
    <!----Loader Start---->
    <div class="ms_loader">
        <div class="wrap">
            <img src="images/loader.gif" alt="">
        </div>
    </div>
    <!----Main Wrapper Start---->
    <div class="ms_main_wrapper">
        <!---Side Menu Start--->
        <?php include "shared/sidebar.php" ?>
        <!---Main Content Start--->
        <div class="ms_content_wrapper padder_top80">
            <!---Header--->
            <?php include "shared/header.php" ?>
            <!---Banner--->
            <div class="ms-banner">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="ms_banner_img">
                                <img src="images/b.png" alt="" class="img-fluid">
                            </div>
                            <div class="ms_banner_text">
                                <h1>This Month’s</h1>
                                <h1 class="ms_color">Record Breaking Albums !</h1>
                                <p>Dream your moments, Until I Met You, Gimme Some Courage, Dark Alley, One More Of A Stranger, Endless<br> Things, The Heartbeat Stops, Walking Promises, Desired Games and many more...</p>
                                <div class="ms_banner_btn">
                                    <a href="#" class="ms_btn">Listen Now</a>
                                    <a href="#" class="ms_btn">Add To Queue</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!---Recently Played Music--->
            <div class="ms_rcnt_slider">
                <div class="ms_heading">
                    <h1>Trending</h1>
                    <span class="veiw_all"><a href="#">view more</a></span>
                </div>
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        <?php
                        $link = mysqli_connect('localhost', 'root', '', 'music_db');
                        $q = "SELECT *  from `uploads`";
                        $res = mysqli_query($link, $q);
                        while ($row = mysqli_fetch_assoc($res)) {
                        ?>
                            <div class="swiper-slide">
                                <div class="ms_rcnt_box">
                                    <div class="ms_rcnt_box_img">
                                        <img src="admin/assets/musicphoto/<?= $row["cover_image"] ?>" style="height:280px;" alt="">
                                        <div class="ms_main_overlay">
                                            <div class="ms_box_overlay"></div>
                                            <div class="ms_more_icon">
                                                <img src="images/svg/more.svg" alt="">

                                            </div>
                                            <ul class="more_option">
                                                <li><a href="#"><span class="opt_icon"><span class="icon icon_fav"></span></span>Add To Favourites</a></li>
                                                <li><a href="#"><span class="opt_icon"><span class="icon icon_queue"></span></span>Add To Queue</a></li>
                                                <li><a href="#"><span class="opt_icon"><span class="icon icon_dwn"></span></span>Download Now</a></li>
                                                <li><a href="#"><span class="opt_icon"><span class="icon icon_playlst"></span></span>Add To Playlist</a></li>
                                                <li><a href="#"><span class="opt_icon"><span class="icon icon_share"></span></span>Share</a></li>
                                            </ul>
                                            <div class="ms_play_icon">
                                                <a href="album_single.php?id=<?= $row['id'] ?>">
                                                    <img src="images/svg/play.svg" alt="">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ms_rcnt_box_text">
                                        <h3><a href="album_single.php?id=<?= $row['id'] ?>"><?= $row['title'] ?></a></h3>
                                        <p><?= $row['genre_id'] ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
                <!-- Add Arrows -->
                <div class="swiper-button-next slider_nav_next"></div>
                <div class="swiper-button-prev slider_nav_prev"></div>
            </div>
            <!---Featured Artists Music--->
            <div class="ms_rcnt_slider">
                <div class="ms_heading">
                    <h1>Featured Artist</h1>
                    <span class="veiw_all"><a href="#">view more</a></span>
                </div>
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        <?php
                        $link = mysqli_connect('localhost', 'root', '', 'music_db');
                        $q = "SELECT *  from `uploads`";
                        $res = mysqli_query($link, $q);
                        while ($row = mysqli_fetch_assoc($res)) {
                        ?>
                            <div class="swiper-slide">
                                <div class="ms_rcnt_box">
                                    <div class="ms_rcnt_box_img">
                                        <img src="admin/assets/musicphoto/<?= $row["cover_image"] ?>" style="height:280px;" alt="">
                                        <div class="ms_main_overlay">
                                            <div class="ms_box_overlay"></div>
                                            <div class="ms_more_icon">
                                                <img src="images/svg/more.svg" alt="">

                                            </div>
                                            <ul class="more_option">
                                                <li><a href="#"><span class="opt_icon"><span class="icon icon_fav"></span></span>Add To Favourites</a></li>
                                                <li><a href="#"><span class="opt_icon"><span class="icon icon_queue"></span></span>Add To Queue</a></li>
                                                <li><a href="#"><span class="opt_icon"><span class="icon icon_dwn"></span></span>Download Now</a></li>
                                                <li><a href="#"><span class="opt_icon"><span class="icon icon_playlst"></span></span>Add To Playlist</a></li>
                                                <li><a href="#"><span class="opt_icon"><span class="icon icon_share"></span></span>Share</a></li>
                                            </ul>
                                            <div class="ms_play_icon">
                                                <a href="album_single.php?id=<?= $row['id'] ?>">
                                                    <img src="images/svg/play.svg" alt="">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ms_rcnt_box_text">
                                        <h3><a href="album_single.php?id=<?= $row['id'] ?>"><?= $row['title'] ?></a></h3>
                                        <p><?= $row['genre_id'] ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
                <!-- Add Arrows -->
                <div class="swiper-button-next slider_nav_next"></div>
                <div class="swiper-button-prev slider_nav_prev"></div>
            </div>
            <!----Add Section Start---->
            <div class="ms_advr_wrapper">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <a href="#"><img src="images/adv.jpg" alt="" class="img-fluid" /></a>
                        </div>
                    </div>
                </div>
            </div>

        <!----Main div close-- -->
    </div>
    <!----Footer Start---->
    <?php include "shared/footer.php" ?>
    <!----Audio Player Section---->
    <!--Main js file Style-->
    <?php include "shared/scripts.php" ?>
</body>

</html>