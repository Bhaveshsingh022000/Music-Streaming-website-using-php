<?php
session_start();
$serverName = "localhost";
$username = "root";
$password = "";
$dbName = "music";
$conn = new mysqli($serverName,$username,$password,$dbName);

$q1 = "select * from landing";
$res1=$conn->query($q1); 
$row = $res1 -> fetch_assoc();

?>

<!-- Profile Picture Upload
<?php
if(isset($_POST['signUp']))
{
  $file = $_FILES['profilePic'];
  $fileName = $file['name'];
  $tempLoc = $file['tmp_name'];
  $destination = 'Assets/users/profilePictures/'.$fileName;
  move_uploaded_file($tempLoc,$destination);
}
?> -->
<!-- Sign IN -->
<?php
if(isset($_POST['signUp'])){
  $name = $_POST['name'];
  $phone = $_POST['phone'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $insertQuery = "insert into user(name,email,password,phone) values('$name','$email','$password','$phone')";
  $conn->query($insertQuery);
}
?>
<!-- login -->
<?php
$navBar = FALSE;
if(isset($_POST['logIn'])){
  $logEmail = $_POST['loginEmail'];
  $logPass = $_POST['loginPass'];
  $selectQuery = "select email, id, password, name from user where email='$logEmail' and password='$logPass'";
  $resultq=$conn->query($selectQuery);
  $show = $resultq->fetch_assoc();
  $displayName = '';
  if($show['email']==$logEmail && $show['password']==$logPass){
    $navBar = true;
    $userId = $show['id'];
    $displayName = $show['name'];
    $displayName = (explode(" ",$displayName));
    $_SESSION["user_id"] = $show['id'];
    $_SESSION["user_name"]= $displayName;
  }
  else{
    echo"nai";
  }
  
}


if(isset($_GET['logout'])){
  header("Location: http://localhost:3005/music/landing.php");
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
    //   $(document).ready(function(){
           
    //     $('#tr2').hide();
    // $('#prevForm').hide();
    //     $("#prevForm").click(function(){
    //         $("#tr2").slideUp();
    //         $("#tr").slideDown();
    //         $('#prevForm').hide();
    //     });
        
    //     });
    //     function t(){
    //       console.log(document.getElementById('signUpBtn').value);
    //     }
        function checklog(){
          alert('You need to login first');
        }
        
    </script>
</head>
<body>
  <!-- Nav Bar -->
  <?php
  if($navBar == false){
  echo "<ul id='navBar' class='nav justify-content-end'>";
    echo "<li class='nav-item'>";
      echo "<a class='nav-link active' href='#'>Home</a>";
    echo "</li>";
    echo "<li class='nav-item'>";
      echo "<a class='nav-link' onclick='checklog()'>Web player</a>";
    echo "</li>";
    echo "<li class='nav-item'>";
      echo "<a class='nav-link' onclick='showSignUp(true)'>Sign up </a>";
    echo "</li>";
    echo "<li class='nav-item'>";
      echo "<a class='nav-link' onclick='showLogIn(true)'>Log in</a>";
    echo "</li>";
  echo "</ul>";
  }
  elseif($navBar == true){
    
    echo "<ul id='navBar' class='nav justify-content-end'>";
    // echo "<li class='nav-item'>";
    //   echo "<a href='#'><img src='830048.jpg' width='40px' height='40px' class='rounded-circle'></a>";
    // echo "</li>";
    echo "<li class='nav-item'>";
      echo "<a class='nav-link active' href='#'>Home</a>";
    echo "</li>";
    echo "<li class='nav-item'>";
      echo "<a class='nav-link' href='home.php'>Web player</a>";
    echo "</li>";
    echo "<li class='nav-item'>";
      echo "<div class='dropdown'>
      <button type='button' class='btn dropdown-toggle' data-toggle='dropdown'>"
        .'Hi '.$displayName[0].
      "</button>
      <ul class='dropdown-menu'>
                <li><a href='userplaylist.php' style='color:black; font-size:13px; padding-left:10px;'>My Playlist</a></li>
                <li><a href='landing.php' style='color:black; font-size:13px; padding-left:10px;'>Log out</a></li>
                </ul>
    </div>";
    echo "</li>";
  echo "</ul>";
  }
  ?>
  

  <!-- SignUp -->
  <div class="signUpModalContainer" id="sign">
    <div class="signUpModal">
      <i onclick="showSignUp(false)" class="fa fa-times-circle"></i>
        <h2 style="text-align: center; letter-spacing: 3px;">Sign Up</h2>
        <hr>
            <form action="#" method="POST" onsubmit="return check()" name="signUpForm" enctype="multipart/form-data">
              <!-- <div id="tr"> -->
                <text id = "popName" data-toggle="popover" >
                  <input type="text" placeholder="Name" name="name"></text><br>

                <text id = "popPhone" data-toggle="popover" >
                  <input type="number" placeholder="phone no" name="phone"></text><br>

                <text id = "popEmail" data-toggle="popover" >
                  <input type="email" placeholder="Email" name="email" required></text><br>

                <text id = "popPass" data-toggle="popover" >
                  <input type="password" placeholder="Password" name="password"></text><br>
                  
                <text id = "popConfPass" data-toggle="popover" >
                  <input type="password" placeholder="Confirm Password" name="confPassword"></text><br>

                  <input type="radio" name="gender" value="male">                
                  <label for="male">Male</label>                
                  <input type="radio" name="gender" value="female">
                  <label for="female">Female</label><br>
                  <input type="checkbox" name="terms"> I accept the Terms and Conditions<br>
                  <button type="submit" name="signUp" id="signUpBtn">Sign Up</button><br>
              <!-- </div> -->
              <!-- <div id="tr2">
                Select Profile Picture : 
                <input type="file" name="profilePic" onchange="update()" name="fileUpload"><br>
                <img id="profilePicDisplay" alt=""><br><br>
                Date Of Birth : <input type="date" name="dob"><br><br>
                <button type="submit" name="signUp" id="signUpBtn">Sign Up</button><br>
              </div> -->
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
        <input type="text" name="loginEmail" placeholder="Email"><br>
        <input type="password" name="loginPass" placeholder="Password"><br>
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
      <li data-target="#demo" data-slide-to="4"></li>
    </ul>
    <div class="carousel-inner">

      <div class="carousel-item active">
        <a href="<?php echo $row['phplink']; ?>"><img src="<?php echo $row['slider_image']; ?>" alt="New York"></a>
        <div class="carousel-caption">
          <h1><?php echo $row['caption_heading']; ?></h1>
          <p><?php echo $row['caption_content']; ?></p>
        </div>   
      </div>

    <?php
    
    while($f = $res1->fetch_assoc()){
      echo "<div class='carousel-item'>";
      echo "<a href='$f[phplink]'><img src=".$f['slider_image']."></a>";
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
    <form method='get' action="home.php">
      <button type="submit" name="webplayer" class="launchBtn">Launch Web Player</button>
    </form>
    
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
        echo "<a href='$f2[phplink]'><button><i class='fa'>&#xf04b</i></button></a>";
        echo "</div>";
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
        echo "<a href='$f2[phplink]'><button><i class='fa'>&#xf04b</i></button></a>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
      }
      ?> 
    </div>


    </div>
  </div>
    
</body>

</html>