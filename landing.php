<?php
$serverName = "localhost";
$username = "root";
$password = "";
$dbName = "music";
$conn = new mysqli($serverName,$username,$password,$dbName);

$q1 = "select * from landing";
$res1=$conn->query($q1);
$row = $res1 -> fetch_assoc();




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" text="text/css" href="landing.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <title>Document</title>
</head>
<body>
  <!-- Nav Bar -->
  <ul id="navBar" class="nav justify-content-end">
    <li class="nav-item">
      <a href="#"><img src="269-2697881_computer-icons-user-clip-art-transparent-png-icon.png" width="40px" height="40px" class="rounded-circle"></a>
    </li>
    <li class="nav-item">
      <a class="nav-link active" href="#">Home</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="home.php">Web player</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Sign up </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Log in</a>
    </li>
  </ul>

  <!-- SignUp -->
  <div class="SignUpModal">
  <form action="#">
  <input type="text">
  <input type="text">
  <input type="text">
  </form>
  </div>

<!-- Slider -->
  <div class="headContainer">
  <div id="demo" class="carousel slide" data-ride="carousel">
    <ul class="carousel-indicators">
      <li data-target="#demo" data-slide-to="0" class="active"></li>
      <li data-target="#demo" data-slide-to="1"></li>
      <li data-target="#demo" data-slide-to="2"></li>
    </ul>
    <div class="carousel-inner">

      <div class="carousel-item active">
        <img src="<?php echo $row['slider_image']; ?>" alt="New York">
        <div class="carousel-caption">
          <h1><?php echo $row['caption_heading']; ?></h1>
          <p><?php echo $row['caption_content']; ?></p>
        </div>   
      </div>

    <?php 
    while($f = $res1->fetch_assoc()){
      echo "<div class='carousel-item'>";
      echo "<img src=".$f['slider_image'].">";
      echo "<div class='carousel-caption'>";
      echo "<h1>".$f['caption_heading']."</h1>";
      echo "<p>".$f['caption_content']."</p>";
      echo "</div>";   
      echo "</div>";
    } 
    ?>
      
    </div>
    <a class="carousel-control-prev" href="#demo" data-slide="prev">
      <span class="carousel-control-prev-icon"></span>
    </a>
    <a class="carousel-control-next" href="#demo" data-slide="next">
      <span class="carousel-control-next-icon"></span>
    </a>
  </div>
  </div>

  <!-- Contents of website -->
  <div class="main-container">
    <h1>Looking For Music ?</h1>
    <button type="button" class="launchBtn">Launch Web Player</button>
    
    <div class="container-fluid">
      <h2 style="color: white;">Newly Released</h2>
    <div class="row">
      <?php 
      $q2 = "select * from landing_grid limit 4";
      $res2=$conn->query($q2);
      while($f2 = $res2->fetch_assoc()){
        echo "<div class='col-lg-3'>";
        echo "<div class='card' >";
        echo "<img class='card-img-top' src=".$f2['grid_image']." alt='Card image'>";
        echo "<div class='card-body'>";
        echo "<h4 class='card-title'>".$f2['grid_content_title']."</h4>";
        echo "<p class='card-text'>".$f2['grid_content']."</p>";
        echo "<a href='#'><button><i class='fa'>&#xf04b</i></button></a>";
        echo "</div>;";
        echo "</div>";
      echo "</div>";
      }
      ?>

    </div>

    <h2 style="color: white;">Popular albums</h2>
    <div class="row">

     <?php 
      $q2 = "select * from landing_grid limit 4, 5";
      $res2=$conn->query($q2);
      while($f2 = $res2->fetch_assoc()){
        echo "<div class='col-lg-3'>";
        echo "<div class='card' >";
        echo "<img class='card-img-top' src=".$f2['grid_image']." alt='Card image'>";
        echo "<div class='card-body'>";
        echo "<h4 class='card-title'>".$f2['grid_content_title']."</h4>";
        echo "<p class='card-text'>".$f2['grid_content']."</p>";
        echo "<a href='#'><button><i class='fa'>&#xf04b</i></button></a>";
        echo "</div>;";
        echo "</div>";
      echo "</div>";
      }
      ?> 
    </div>


    </div>
  </div>
    
</body>
</html>