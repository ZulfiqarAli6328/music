<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<!-- blank.html  Tue, 07 Jan 2020 03:35:42 GMT -->

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Available Seats &mdash; Admin</title>
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
                        <h1>Available Seats</h1>
                    </div>

                    <div class="section-body">

                        <table class="table table-hover table-striped ">
                            <thead>
                                <tr class="table-dark">
                                    <th scope="col" style="color: white;">#</th>
                                    <th scope="col" style="color: white;">Movie Name</th>
                                    <th scope="col" style="color: white;">Total Seats</th>
                                    <th scope="col" style="color: white;">Available Seats</th>


                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $link = mysqli_connect('localhost', 'root', '', 'ticket-booking');
                                $q = "SELECT * from `upload_trailers`";
                                $res = mysqli_query($link, $q);
                                while ($row = mysqli_fetch_assoc($res)) {
                                ?>
                                    <tr>
                                        <th scope="row"><?= $row['id'] ?></th>
                                        <td><?= $row['movie_name'] ?></td>
                                        <td><?= $row['total_seats'] ?></td>
                                        <td><?= $row['available_seats'] ?></td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>


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