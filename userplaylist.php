<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="userplaylist.css" text="text/css" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <title>Document</title>
</head>
<body>
    <div class="mainContainer">
    <ul id="navbar" class="nav justify-content-center">
            <li class="nav-item">
            <a class="nav-link" href="home.php">HOME</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="discover.php">DISCOVER</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="trending.php">TRENDING</a>
            </li>
            <li class="nav-item active">
            <a class="nav-link" href="trending.php">MY PLAYLIST</a>
            </li>
            <li class='nav-item profile'>
            <div class='dropdown'>
      <button type='button' class='btn dropdown-toggle' data-toggle='dropdown'><?php echo $_SESSION['user_name'][0]; ?></button>
      <ul class="dropdown-menu">
    <li><a href="userplaylist.php" style='color:black; font-size:13px; padding-left:10px;'>My Playlist</a></li>
    <li><a href="landing.php" style='color:black; font-size:13px; padding-left:10px;'>Log out</a></li>
  </ul>
    </div>
            </li>
        </ul>
    </div>
</body>
</html>