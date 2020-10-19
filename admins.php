<?php require_once("includes/DB.php"); ?>
<?php require_once("includes/Functions.php"); ?>
<?php require_once("includes/Sessions.php"); ?>


<?php
if(isset($_POST["Submit"])){
  $UserName = $_POST["Username"];
  $Name = $_POST["Name"];
  $Password = $_POST["Password"];
  $ConfirmPassword = $_POST["ConfirmPassword"];
  
  date_default_timezone_set("Asia/Kolkata");
   $CurrentTime=time();
   
   $DateTime=strftime("%B-%d-%Y %H:%M:%S",$CurrentTime);
  
  
  
  
if(empty($UserName)||empty($Password)||empty($ConfirmPassword)){
  $_SESSION["ErrorMessage"] = "All Fields Must Be Filled Out";
  Redirect_to("admins.php");
}elseif (strlen($Password)<3) {
  $_SESSION["ErrorMessage"] = "Password Must be Greater Than 2 Characters";
Redirect_to("admins.php"); 
}elseif ($Password !== $ConfirmPassword) {
  $_SESSION["ErrorMessage"] = "Password Must Match";
Redirect_to("admins.php"); 

}else {
  //Query to insert category in DB when everything is fine
  global $ConnectingDB;
    $sql = "INSERT INTO admins (datetime, username, password, aname, addedby) VALUES(?, ?, ?)";
    $stmt = $ConnectingDB->prepare($sql);
    $stmt->bind_param('sssss', $DateTime, $UserName, $Password, $Name, $Admin );
    $Execute = $stmt->execute();

  if($Execute){
    $_SESSION["SuccessMessage"]="Category Added Successfully";
    Redirect_to("admins.php");

  }else{
      $_SESSION["ErrorMessage"] = "Something Went Wrong. Try Again !";
  Redirect_to("admins.php");
    }
  

}
} //Ending of Submit Button If-Condition
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
  <link rel="stylesheet" href="Css/styles.css">
  <title>MANAGE ADMINS</title>
</head>
<!-- NAVBAR -->
<div style="height:10px; background:#27aae1;"></div>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a href="#" class="navbar-brand"> BHANVIBHARWAJ.COM</a>
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
        <header class="bg-dark text-white py-1">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
  <h1> Mirakee &spades; </h1>
 </div>
</div>
</div>
</header>
<!-- HEADER END -->
<!--Main Area-->
<section class="container py-2 mb-4">
<div class="row">
<div class="offset-lg-1 col-lg-10" style="min-height:400px;">
  <?php
  echo ErrorMessage();
  echo SuccessMessage(); ?>
<form class="" action="admins.php" method="post">
 <div class="card bg-secondary text-light mb-3">
<div class="card-header">
    <h1> Add New Admin </h1>

</div>
<div class="card-body bg-dark">
<div class="form-group">
<label form="username"> <span class="FieldInfo"> Username:</span></label>
<input class="form-control" type="text" name="Username" id="username"  value="">
</div>
<div class="card-body bg-dark">
<div class="form-group">
<label form="Name"> <span class="FieldInfo"> Name:</span></label>
<input class="form-control" type="text" name="Name" id="title"  value="">
<small class="text-warning text-muted" > Optional </small>
</div>
<div class="card-body bg-dark">
<div class="form-group">
<label form="password"> <span class="FieldInfo"> Password:</span></label>
<input class="form-control" type="password" name="Password" id="password" value="">
</div>
<div class="card-body bg-dark">
<div class="form-group">
<label form="ConfirmPassword"> <span class="FieldInfo"> Confirm Password:</span></label>
<input class="form-control" type="password" name="ConfirmPassword" id="ConfirmPassword"  value="">
</div>

<div class="row style= min-height:50px; background: #27aae1;">
<div class="col-lg-6">
<a href="Dashboard.php" class="btn btn-warning btn-block"><i class="fas fa-arrow-left"></i>Back To Dashboard</a>

</div>
<div class="col-lg-6">
    <button type="submit" name="Submit" class="btn btn-success btn-block">
        <i class="fas-fa-check"></i> Publish
    </button>
</div>
    </div>
</div>
</div>
</form>
</div>
</div>
</section>








        <!--End Main Area-->

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
