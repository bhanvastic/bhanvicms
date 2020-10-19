<?php require_once("Includes/DB.php"); ?>
<?php require_once("Includes/Functions.php"); ?>
<?php require_once("Includes/Sessions.php"); ?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
  <link rel="stylesheet" href="Css/styles.css">
  <title>Posts </title>
</head>
<body>
  <!-- NAVBAR -->
  <div style="height:10px; background:#27aae1;"></div>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a href="#" class="navbar-brand"> BHANVIBHARDWAJ.COM</a>
      <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarcollapseCMS">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarcollapseCMS">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a href="MyProfile.php" class="nav-link"> <i class="fas fa-user text-success"></i> My Profile</a>
        </li>
        <li class="nav-item">
          <a href="Dashboard.php" class="nav-link">Dashboard</a>
        </li>
        <li class="nav-item">
          <a href="posts.php" class="nav-link">Posts</a>
        </li>
        <li class="nav-item">
          <a href="categories.php" class="nav-link">Categories</a>
        </li>
        <li class="nav-item">
          <a href="admins.php" class="nav-link">Manage Admins</a>
        </li>
        <li class="nav-item">
          <a href="comments.php" class="nav-link">Comments</a>
        </li>
        <li class="nav-item">
          <a href="blog.php?page=1" class="nav-link" target="_blank">Live Blog</a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item"><a href="Logout.php" class="nav-link text-danger">
          <i class="fas fa-user-times"></i> Logout</a></li>
      </ul>
      </div>
    </div>
  </nav>
    <div style="height:10px; background:#27aae1;"></div>
    <!-- NAVBAR END -->
    <!-- HEADER -->
    <header class="bg-dark text-white py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h1> Mirakee &spades; </h1>
          </div>
          <div class="col-lg-3 mb-2">
    <a href="addNewPost.php" class="btn btn-primary btn-block">
        <i class="fas fa-edit"></i> Add New Post </a>
          </div>
          <div class="col-lg-3 mb-2">
    <a href="categories.php" class="btn btn-info btn-block">
        <i class="fas fa-folder-plus"></i> Add New Category </a>
          </div>
          <div class="col-lg-3 mb-2">
    <a href="admins.php" class="btn btn-warning btn-block">
        <i class="fas fa-user-plus"></i> Add New Admin
    </a>
          </div>
          <div class="col-lg-3 mb-2">
    <a href="comments.php" class="btn btn-success btn-block">
        <i class="fas fa-check"></i> Approve Comment
    </a>
          </div>

        </div>
      </div>
    </header>
    <!-- HEADER END -->

<!-- Main Area -->
<section class="container py-2 mb-4">
  <div class="row">
    <div class="col-lg-12">
    <?php
       echo ErrorMessage();
       echo SuccessMessage();
       ?>
      <table class="table table-striped table-hover">
        <thead class="thead-dark">

        
        <tr>
    <th>#</th>
    <th>Title</th>
    <th>Catagory</th>
    <th>Date&Time</th>
    <th>Author</th>
    <th>Banner</th>
    <th>Comments</th>
    <th>Action</th>
    <th>Live Preview</th>
  
        </tr>
        </thread>
        <?php
       global $ConnectingDB;
       $sql = "SELECT * FROM posts";
       $stmt = $ConnectingDB->query($sql);
       $Sr = 0;
       while ($DataRows = $stmt->fetch_row()) {
         $Id = $DataRows[0];
         $DateTime = $DataRows[1];
         $PostTitle = $DataRows[2];
         $Catagory = $DataRows[3];
         $Admin = $DataRows[4];
         $Image = $DataRows[5];
         $PostText = $DataRows[6];
         $Sr++;
       
 ?>
 <tbody>
 <tr>
    <td><?php echo $Sr ; ?></td>
    <td class="table-danger">
      <?php
      if (strlen($PostTitle)>20){$PostTitle = substr($PostTitle,0,18).'..';}
     echo $PostTitle ; ?></td>
    <td>
      <?php
      if (strlen($Catagory)>20){$Catagory = substr($Catagory,0,8).'..';}
     echo $Catagory ; ?></td>
    <td>
      <?php
      if (strlen($DateTime)>20){$DateTime = substr($DateTime,0,11).'..';}
      echo $DateTime ; ?></td>
    <td class="table-primary"><?php echo $Admin ; ?></td>
    <td><img src="Uploads/<?php echo $Image ; ?>" width="90px;" height="90px;" </td>
    <td>Comments</td>
    
    <td>
      <a href="editpost.php?id=<?php echo $Id; ?>"><span class="btn btn-warning">Edit</span></a>
      <a href="deletepost.php?id=<?php echo $Id; ?>"><span class="btn btn-danger">Delete</span></a>
    </td>
    <td>
    <a href="fullpost.php?id=<?php echo $Id; ?>" target="_blank"><span class="btn btn-primary">Live Preview</span></a>
    </td>
    
 </tr>
 </tbody>
      <?php } ?>
      </table>
    </div>
  </div>
</section>



<!-- Main Area End -->
    <!-- FOOTER -->
    <footer class="bg-dark text-white">
      <div class="container">
        <div class="row">
          <div class="col">
            <p class="lead text-center">CONTACT | NEWSLETTER | <span id="year"></span> &copy; ----All right Reserved.</p>
            <p class="text-center small"><a style="color: white; text-decoration: none; cursor: pointer;" href=" target="_blank"> <br>&copy; BHANVIBHARWAJ.com &copy; Hakuna Matata &hearts;</a></p>
             </div>
         </div>
      </div>
    </footer>
        <div style="height:10px; background:#27aae1;"></div>
    <!-- FOOTER END-->

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
<script>
  $('#year').text(new Date().getFullYear());
</script>
</body>
</html>