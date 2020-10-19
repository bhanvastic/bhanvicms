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
  <title>Blog Page</title>
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
          <a href="blog.php" class="nav-link">Home</a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">About Us</a>
        </li>
        <li class="nav-item">
          <a href="blog.php" class="nav-link">Blog</a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">Contact us</a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">Features</a>
        </li>
        
      
      <ul class="navbar-nav ml-auto">
        <form class="form-inline" action="blog.php">
            <div class="form-group">
                <input class="form-control mr-2" type="text" name="Search" placeholder="Search here" value="">
           <button  class="btn btn-primary" name="Searchbutton">Go</button>
            </div>


        </form>
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
        </div>
      </div>
    </header>
    
    <br/>
    
    <!-- Main Area -->
    <div class="col-sm-8">
        <h1> LIVE LOVE & LAUGH </h1>
        <?php
       echo ErrorMessage();
       echo SuccessMessage();
       ?>
     <?php
     global $ConnectingDB;
 if (isset($_GET["SearchButton"])){
     $Search = $_GET["Search"];
     $sql = "SELECT FROM posts 
     WHERE datetime LIKE :search 
     OR title LIKE :search 
     OR catagory LIKE :search 
     OR post LIKE :search";
     $stmt = $ConnectingDB->prepare($sql);
     $stmt->bind_param(':search', '%'.$Search.'%');
     $stmt->execute();

 }

 
  else{ $sql = "SELECT * FROM posts ORDER BY id desc "; 
  $stmt = $ConnectingDB->query($sql);
}
  while ($DataRows = $stmt->fetch_row()){
      $PostId = $DataRows[0];
      $DateTime = $DataRows[1];
      $PostTitle = $DataRows[2];
      $Catagory = $DataRows[3];
      $Admin = $DataRows[4];
      $Image = $DataRows[5];
      $PostDescription = $DataRows[6];
  
?>
<div class="card">
    <img src="Uploads/<?php echo htmlentities($Image); ?>" style="max-height:450px;" class="img-fluid card-img-top" />
    <div class="card-body">
        <h4 class="card-title"> <?php echo htmlentities($PostTitle); ?> </h4>
    <small class="text-muted">Written By <?php echo htmlentities($Admin); ?> On <?php echo htmlentities($DateTime); ?></small>
    <span styles= "float:right;" class="badge badge-dark text-light"> Comments 20 </span>
    <hr>
    <p class="card-text">
        <?php 
        if (strlen($PostDescription)>150){
$PostDescription=substr($PostDescription,0,150)."..."; } echo htmlentities($PostDescription); ?></p>
    <a href="fullpost.php?id= <?php echo $PostId; ?>" style="float:right;">
    <span class="btn btn-info"> Read More >> </span>




</a>


    </div>
</div>
        <?php } ?>
    </div>
    <!-- End Main Area --> 
    
    
    <!-- HEADER END -->
<br>
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