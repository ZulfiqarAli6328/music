<?php
session_start();
if ($_SESSION['role'] == 'user') {
    header('location: ../index.php');
    die;
}
?>

<!DOCTYPE html>
<html lang="en">

<!-- blank.html  Tue, 07 Jan 2020 03:35:42 GMT -->

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Home &mdash; Admin</title>
    <?php include 'shared/styles.php' ?>

    <style>
        .contact-counter-item {
            text-align: center;
            padding: 40px 15px;
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 30px;
            margin-bottom: 30px;
            -webkit-transition: all ease 0.3s;
            transition: all ease 0.3s;
        }

        .contact-counter-item .contact-counter-thumb {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            margin: 0 auto 28px;
            background-image: -webkit-linear-gradient(169deg, #5560ff 17%, #aa52a1 63%, #ff4343 100%);
            -webkit-box-shadow: 0px 10px 15px 0px rgba(59, 55, 188, 0.5);
            box-shadow: 0px 10px 15px 0px rgba(59, 55, 188, 0.5);
            color: #ffffff;
            line-height: 50px;
            text-align: center;
            font-size: 20px;
        }

        .contact-counter-item .contact-counter-thumb img {
            width: 100%;
        }

        .contact-counter-item .contact-counter-content .counter-item {
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
            margin-bottom: 15px;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
        }

        .contact-counter-item .contact-counter-content .counter-item .title {
            text-transform: uppercase;
            display: inline-block;
        }

        .contact-counter-item .contact-counter-content p {
            color: #31d7a9;
        }

        .contact-counter-item:hover,
        .contact-counter-item.active {
            background: -webkit-linear-gradient(120deg, #3b26db 1%, #7b19cb 100%);
            animation-name: fadeIn;
            -webkit-animation-name: fadeIn;
            -moz-animation-name: fadeIn;
            animation-duration: 1s;
            -webkit-animation-duration: 1s;
            -moz-animation-duration: 1s;
            border-color: transparent;
        }

        @media (max-width: 575px) {
            .contact-counter-item {
                max-width: 350px;
                margin-left: auto;
                margin-right: auto;
            }
        }
    </style>
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
                        <h1>Admin Dashboard</h1>
                    </div>

                    <div class="section-body">
                        <!-- ==========Contact-Counter-Section========== -->

                        <?php
                        $link = mysqli_connect('localhost', 'root', '', 'ticket-booking');
                        $q1 = "SELECT `id` FROM `upload_trailers` ORDER BY id";
                        $res1 = mysqli_query($link, $q1);
                        $movies = mysqli_num_rows($res1);
                        ?>
                        <section class="contact-counter padding-top padding-bottom">
                            <div class="container">
                                <div class="row justify-content-center mb-30-none">
                                    <div class="col-sm-6 col-md-3">
                                        <div class="contact-counter-item">
                                            <div class="contact-counter-thumb">
                                                <i class="fas fa-film"></i>
                                            </div>
                                            <div class="contact-counter-content">
                                                <div class="counter-item">
                                                    <h5 class="title odometer" data-odometer-final="130"></h5>
                                                    <h5 class="title"><?= $movies ?></h5>
                                                </div>
                                                <p style="color: black; font-weight:bolder ;">Movies</p>
                                            </div>
                                        </div>
                                    </div>

                                    <?php
                                    $q2 = "SELECT `id` FROM `users` ORDER BY id";
                                    $res2 = mysqli_query($link, $q2);
                                    $members = mysqli_num_rows($res2);
                                    ?>
                                    <div class="col-sm-6 col-md-3">
                                        <div class="contact-counter-item">
                                            <div class="contact-counter-thumb">
                                                <i class="fas fa-users"></i>
                                            </div>
                                            <div class="contact-counter-content">
                                                <div class="counter-item">
                                                    <h5 class="title odometer" data-odometer-final="35"></h5>
                                                    <h5 class="title"><?= $members ?></h5>
                                                </div>
                                                <p style="color: black; font-weight:bolder ;">Members</p>
                                            </div>
                                        </div>
                                    </div>

                                    <?php
                                    $q3 = "SELECT `ticket_id` FROM `booked_tickets` ORDER BY ticket_id";
                                    $res3 = mysqli_query($link, $q3);
                                    $tickets = mysqli_num_rows($res3);
                                    ?>

                                    <div class="col-sm-6 col-md-3">
                                        <div class="contact-counter-item">
                                            <div class="contact-counter-thumb">
                                            <i class="fa-solid fa-ticket-simple"></i>                                            </div>
                                            <div class="contact-counter-content">
                                                <div class="counter-item">
                                                    <h5 class="title odometer" data-odometer-final="47"></h5>
                                                    <h5 class="title"><?= $tickets ?></h5>
                                                </div>
                                                <p style="color: black; font-weight:bolder ;">Booked Tickets</p>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                    $q4 = "SELECT `id` FROM `subscribers` ORDER BY id";
                                    $res4 = mysqli_query($link, $q4);
                                    $subscriber = mysqli_num_rows($res4);
                                    ?>
                                    <div class="col-sm-6 col-md-3">
                                        <div class="contact-counter-item">
                                            <div class="contact-counter-thumb">
                                                <i class="fas fa-envelope"></i>
                                            </div>
                                            <div class="contact-counter-content">
                                                <div class="counter-item">
                                                    <h5 class="title odometer" data-odometer-final="291"></h5>
                                                    <h5 class="title"><?= $subscriber ?></h5>
                                                </div>
                                                <p style="color: black; font-weight:bolder ;">Subscribers</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <!-- ==========Contact-Counter-Section========== -->

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