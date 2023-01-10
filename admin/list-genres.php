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
      <th scope="col" style="color: white;">Category Name</th>
      <th scope="col" style="color: white;">Description</th>
      <th scope="col" style="color: white;">Cover photo</th>
      <th scope="col" style="color: white;">Action</th>


    </tr>
  </thead>
  <tbody>
  <?php                    
                     $link = mysqli_connect('localhost', 'root', '', 'music_db');
                     $q = "SELECT * from `genres`";
                     $res = mysqli_query($link,$q);
                     while($row = mysqli_fetch_assoc($res)){
                   ?>

    <tr>
      <th scope="row"><?=$row['id']?></th>
      <td><?=$row['genre']?></td>
      <td><?=$row['description']?></td>
      <td><img src="assets/genresphoto/<?=$row['cover_photo']?>" alt="" style="width: 100px;height: 100px;" class="mt-3"></td>
      <td>
    <a href="delete.php?id=<?=$row['id']?>" class="btn btn-outline-danger">DELETE</a>
    
    
    </td>
     
      

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