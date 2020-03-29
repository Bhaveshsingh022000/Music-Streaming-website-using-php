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

<!-- Profile Picture Upload -->
<?php
if(isset($_POST['signUp']))
{
  $file = $_FILES['profilePic'];
  $fileName = $file['name'];
  $tempLoc = $file['tmp_name'];
  $destination = 'Assets/users/profilePictures/'.$fileName;
  move_uploaded_file($tempLoc,$destination);
  
}
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
  <script src="landing.js">  </script>
    <title>Document</title>
    <script>
      $(document).ready(function(){
           
        $('#tr2').hide();
    $('#prevForm').hide();
        $("#prevForm").click(function(){
            $("#tr2").slideUp();
            $("#tr").slideDown();
            $('#prevForm').hide();
        });
        
        });
        function t(){
          console.log(document.getElementById('signUpBtn').value);
        }
        
    </script>
</head>
<body>
  <!-- Nav Bar -->
  <ul id="navBar" class="nav justify-content-end">
    <li class="nav-item">
      <a href="#"><img src="830048.jpg" width="40px" height="40px" class="rounded-circle"></a>
    </li>
    <li class="nav-item">
      <a class="nav-link active" href="#">Home</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="home.php">Web player</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" onclick="showSignUp(true)">Sign up </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" onclick="showLogIn(true)">Log in</a>
    </li>
  </ul>

  <!-- SignUp -->
  <div class="signUpModalContainer" id="sign">
    <div class="signUpModal">
      <i onclick="showSignUp(false)" class="fa fa-times-circle"></i>
      <i id="prevForm" class="fa fa-arrow-circle-left"></i>
        <h2 style="text-align: center; letter-spacing: 3px;">Sign Up</h2>
        <hr>
            <form action="#" method="POST" name="signUpForm" enctype="multipart/form-data">
              <div id="tr">
                <text id = "popName" data-toggle="popover" data-trigger="focus">
                  <input type="text" placeholder="Name" name="name"></text><br>

                <text id = "popPhone" data-toggle="popover" data-trigger="focus">
                  <input type="number" placeholder="phone no" name="phone"></text><br>

                <text id = "popemail" data-toggle="popover" data-trigger="focus">
                  <input type="email" placeholder="Email" name="email" required></text><br>

                <text id = "popPass" data-toggle="popover" data-trigger="focus">
                  <input type="password" placeholder="Password" name="password"></text><br>
                  
                <text id = "popConfPass" data-toggle="popover" data-trigger="focus">
                  <input type="password" placeholder="Confirm Password" name="confPassword"></text><br>

                  <input type="radio" name="gender" value="male">                
                  <label for="male">Male</label>                
                  <input type="radio" name="gender" value="female">
                  <label for="female">Female</label><br>
                  <input type="checkbox" name="terms" name="term"> I accept the Terms and Conditions<br>
                  <button type="button" name="next" id="nex" onclick="check()" >Next</button><br>
              </div>
              <div id="tr2">
                Select Profile Picture : 
                <input type="file" name="profilePic" name="fileUpload"><br>
                <img src="1563174.jpg" alt=""><br><br>
                Date Of Birth : <input type="date" name="dob"><br><br>
                <button type="submit" name="signUp" id="signUpBtn">Sign Up</button><br>
              </div>
              <p>Already have an account ?<span onclick="switchSL(true)"> Login</span></p>
            </form>
    </div>
  </div>

  <!-- Login -->
  <div class="logInModalContainer" id="log">
    <div class="logInModal">
    <i onclick="showLogIn(false)" class="fa fa-times-circle"></i>
      <h2 style="text-align: center; letter-spacing: 3px;">Log In</h2>
      <hr>
      <form action="#" method="POST">
        <input type="text" placeholder="Email"><br>
        <input type="password" placeholder="Password"><br>
        <p id="forgot">Forgot Password ?</p>
        <button type="submit" name="logIn">Log In</button><br>
        <p>New User ?<span onclick="switchSL(false)"> Sign Up</span></p>
      </form>
    </div>
  </div>

<!-- Slider -->
  <div class="headContainer">
  <div id="demo" class="carousel slide" data-ride="carousel">
    <ul class="carousel-indicators">
      <li data-target="#demo" data-slide-to="0" class="active"></li>
      <li data-target="#demo" data-slide-to="1"></li>
      <li data-target="#demo" data-slide-to="2"></li>
      <li data-target="#demo" data-slide-to="3"></li>
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