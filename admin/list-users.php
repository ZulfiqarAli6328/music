<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<!-- blank.html  Tue, 07 Jan 2020 03:35:42 GMT -->
<head>
<meta charset="UTF-8">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
<title>List-Categories &mdash; Admin</title>
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
                    <h1>List-Categories</h1>
                </div>

                <div class="section-body">

                <table class="table table-hover table-striped ">
  <thead>
    <tr class="table-dark">
      <th scope="col" style="color: white;">#</th>
      <th scope="col" style="color: white;">User Name</th>
      <th scope="col" style="color: white;">User Email</th>
      <th scope="col" style="color: white;">Password</th>
      <th scope="col" style="color: white;">Action</th>


    </tr>
  </thead>
  <tbody>
  <?php                    
                     $link = mysqli_connect('localhost', 'root', '', 'music_db');
                     $q = "SELECT * from `users`";
                     $res = mysqli_query($link,$q);
                     while($row = mysqli_fetch_assoc($res)){
                   ?>

    <tr>
      <th scope="row"><?=$row['user_id']?></th>
      <td><?=$row['username']?></td>
      <td><?=$row['email']?></td> 
      <td><?=$row['password']?></td>
      <td> <a href="delete-user.php?id=<?=$row['user_id']?>" class="btn btn-danger">Delete</a></td>
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