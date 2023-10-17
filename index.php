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
<?php include "./partials/_header.php" ?>

<!-- Slider -->
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="https://statetechmagazine.com/sites/statetechmagazine.com/files/styles/cdw_hero/public/articles/%5Bcdw_tech_site%3Afield_site_shortname%5D/201905/ST-security2019.jpg?itok=6kzvHynm" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="https://edtechmagazine.com/higher/sites/edtechmagazine.com.higher/files/styles/cdw_hero/public/articles/EdTech/201706/welcomia_Coding.jpg?itok=2B9_vddh" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="https://akronsoluciones.com/wp-content/uploads/2018/08/annie-spratt-608001-unsplash@2x.png" class="d-block w-100" alt="...">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

<!-- Main -->
<div class="container py-4 text-center">
  <h1>iDiscuss - Browse Categories</h1>
</div>
<div class="container">
  <div class="row mx-auto px-5 pb-5">
<?php
// Connect To Database
require "./partials/_db_connect.php";
// Select Categories
$sql = "SELECT * FROM `categories`";
$result = mysqli_query($conn, $sql);
$num_rows = mysqli_num_rows($result);
if ($num_rows > 0) {
  while ($row = mysqli_fetch_assoc($result)) {
    echo '<div class="col-md-4 my-4">';
    echo '<div class="card shadow" style="width: 18rem;">';
    echo '<img src="' .$row["category_img"] . '" class="card-img-top" alt="">';
    echo '<div class="card-body">';
    echo '<h5 class="card-title"> <a href="./threadlist.php?cat_id=' . $row["category_id"] . '"> '. $row["category_name"]  . '</a></h5>';
    echo '<p class="card-text">'. $row["category_desc"] .'</p>';
    echo '<a href="./threadlist.php?cat_id=' . $row["category_id"] . '" class="btn btn-success">View Threads</a>';
    echo '</div> </div> </div>';
  }
} else {
  echo "No Data Found!";
}
?>
</div>
</div>

<!-- Footer -->
<?php include "./partials/_footer.php" ?>

<!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>

</html>