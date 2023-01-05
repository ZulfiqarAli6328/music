<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<!-- blank.html  Tue, 07 Jan 2020 03:35:42 GMT -->
<head>
<meta charset="UTF-8">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
<title>List-Movies &mdash;Admin</title>
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
                    <h1>List Movies</h1>
                </div>

                <div class="section-body">

                <table class="table table-striped">
  <thead>
    <tr class="table-dark">
      <th scope="col" style="color: white;">#</th>
      <th scope="col" style="color: white;">Movie Name</th>
      <th scope="col" style="color: white;">Description</th>
      <th scope="col" style="color: white;">Date</th>
      <th scope="col" style="color: white;">Time</th>
      <th scope="col" style="color: white;">Category</th>
      <th scope="col" style="color: white;">Theatre</th>
      <th scope="col" style="color: white;">Image</th>
      <th scope="col" style="color: white;">Trailer</th>
      <th scope="col" style="color: white;">Release-Date</th>
      <th scope="col" style="color: white;">S-Shot 1</th>
      <th scope="col" style="color: white;">S-Shot 2</th>
      <th scope="col" style="color: white;">S-Shot 3</th>
      <th scope="col" style="color: white;">S-Shot 4</th>
      <th scope="col" style="color: white;">S-Shot 5</th>
      <th scope="col" style="color: white;">S-Shot 6</th>
      <th scope="col" style="color: white;">Movie Banner</th>
      <th scope="col" style="color: white;">Action</th>


    </tr>
  </thead>
  <tbody>
  <?php
                     
                    
                     $link = mysqli_connect('localhost', 'root', '', 'ticket-booking');
                     $q = "SELECT * from `upload_trailers`";
                     $res = mysqli_query($link,$q);
                     while($row = mysqli_fetch_assoc($res)){
                   ?>

    <tr>
      <th scope="row"><?=$row['id']?></th>
      <td><?=$row['movie_name']?></td>
      <td><?=$row['description']?></td>
      <td><?=$row['date']?></td>
      <td><?=$row['time']?></td>
      <td><?=$row['category']?></td>
      <td><?=$row['theatre']?></td>
      <td><?=$row['img']?></td>
      <td><?=$row['trailer']?></td>
      <td><?=$row['release-date']?></td>
      <td><?=$row['Screen-shot1']?></td>
      <td><?=$row['Screen-shot2']?></td>
      <td><?=$row['Screen-shot3']?></td>
      <td><?=$row['Screen-shot4']?></td>
      <td><?=$row['Screen-shot5']?></td>
      <td><?=$row['Screen-shot6']?></td>
      <td><?=$row['Movie-banner']?></td>
      <td>
    <a href="delete.php?id=<?=$row['id']?>" class="btn btn-outline-danger">DELETE</a>
    <a href="update.php?id=<?=$row['id']?>" class="btn btn-warning">Edit</a>
    
    
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