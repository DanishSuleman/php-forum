<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- <link rel="stylesheet" href="./assets/css/style.css"> -->
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <title>iDiscuss, Coding forums</title>
</head>
<body>

<!-- Header -->
<?php include "./partials/_header.php" ; ?>

<!-- Main -->

<div class="container py-3">
<div class="jumbotron">
<?php 
require "./partials/_db_connect.php";
$cat = $_GET["cat_id"];
$sql = "SELECT * FROM `categories` where category_id ='" . $cat . "'";
$result = mysqli_query($conn, $sql);
$num_rows = mysqli_num_rows($result);
if ($num_rows > 0) {
    $row = mysqli_fetch_assoc($result);
    echo '<h1 class="display-4"> Welcome to ' . $row["category_name"]. ' Forums!</h1>';
    echo '<p class="lead">'. $row["category_desc"] . '</p>';
} else {
  echo "No Data Found!";
}
?>
<hr class="my-4">
  <p>Be civil.
Don't post anything that a reasonable person would consider offensive, abusive, or hate speech.
Keep it clean. Don't post anything obscene or sexually explicit.
Respect each other. Don't harass or grief anyone, impersonate people, or expose their private information.
Respect our forum.
  </p>
  <a class="btn btn-success mt-4 btn-primary btn-lg" href="#" role="button">Learn more</a>
</div>
 </div>
 <div class="container">
<h2>Browse Questions</h2>
<?php
$sql = "SELECT * FROM `threads` WHERE `thread_cat_id` ='" . $cat . "'";
$result = mysqli_query($conn, $sql);
$num_rows = mysqli_num_rows($result);
if ($num_rows > 0) {
  while ($row = mysqli_fetch_assoc($result)){
    echo '<div class="media py-3">
  <img width="54" src="./assets//images/default-avatar-profile-icon-of-social-media-user-vector-removebg-preview.png" class="mr-3" alt="...">
  <div class="media-body">
    <h5 class="mt-0"> <a class="text-dark" href="thread.php?thread_id='.$row["thread_id"] . '">'. $row["thread_title"] .'</a></h5>
    '. $row["thread_desc"] .'
  </div>
</div>
';
  }
} else {
  echo "No Questions found on this thread!";
}
?>

</div>
<!-- Footer -->
<?php include "./partials/_footer.php" ?>

<!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>

</html>