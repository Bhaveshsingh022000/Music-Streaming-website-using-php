<?php
include('player.php');
$serverName = "localhost";
$username = "root";
$password = "";
$dbName = "music";
$conn = new mysqli($serverName,$username,$password,$dbName);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" text="text/css" href="home.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <title>Home</title>
</head>
<script>
    function fun(x){
        document.getElementById(x).submit();
        
    }
</script>
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
        <a class="nav-link" href="#">TRENDING</a>
        </li>
        </ul>
        <div class="container-fluid">
            <?php
                $queryArtist = 'select collection_title.collection_name, artist.p_name, artist.Artist_name, artist.Artist_image from 
                collection_title inner join collection on collection.collection_title_id = collection_title.collection_title_id 
                inner join artist on collection.artist_id = artist.Artist_id WHERE collection_title.collection_title_id = 1';
                $resultArtist = $conn->query($queryArtist);
                $artist = array();
                while($f1 = $resultArtist->fetch_assoc()){$artist [] = $f1;}
                echo "<h2>".$artist[0]['collection_name']."</h2>";
                echo "<div class='row'>";
                foreach($artist as $r){
                    $temp = $r['p_name'];
                echo "<form action='play.php' method='get' id=$temp>";
                echo "<div class='col-lg-2' >";
                echo "<div class='card' onclick=fun("."'".$temp."'".")>";
                echo "<img class='card-img-top' src=".$r['Artist_image']." alt='Card image'>";
                echo "<div class='card-body'>";
                echo "<h5 class='card-title'>".$r['Artist_name']."</h5>";
                echo "<input style='display:none' type=text name='artist' value=$temp>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
                echo "</form>";
                }
                echo "</div>";
            ?>
            
            

            <?php
                $queryMood = 'select collection_title.collection_name, playlist.p_name, playlist.playlist_name, playlist.playlist_image from 
                collection_title inner join collection on collection.collection_title_id = collection_title.collection_title_id 
                inner join playlist on collection.playlist_id = playlist.playlist_id where collection_title.collection_title_id = 2';
                $resultMood = $conn->query($queryMood);
                $mood = array();
                while($f2 = $resultMood->fetch_assoc()){$mood [] = $f2;}
                echo "<h2>".$mood[0]['collection_name']."</h2>";
                echo "<div class='row'>";
                foreach($mood as $m){
                    $temp = $m['p_name'];
                echo "<form action='play.php' method='get' id=$temp>";
                echo "<div class='col-lg-2'>";
                echo "<div class='card' id='mood' onclick=fun("."'".$temp."'".")>";
                echo "<img class='card-img-top' src=".$m['playlist_image']." alt='Card image'>";
                echo "<div class='card-body'>";
                echo "<h6 class='card-title'>".$m['playlist_name']."</h6>";
                echo "<input style='display:none' type=text name='mood' value=$temp>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
                echo "</form>";
                }
                echo "</div>";
            ?>

            <h2>Sing Along</h2>
            <div class="row">
                <div class='col-lg-2'>
                    <div class='card' id="sing">
                        <img class='card-img-top' src="220px-Benny_Blanco,_Halsey_and_Khalid_Eastside.png" alt='Card image'>
                        <div class="card-img-overlay">
                            <button><i class="fa">&#xf04b;</i></button>
                        </div>
                        <div class="card-body">
                            <h6>Eastside</h6>
                        </div>
                    </div>
                </div>
                <div class='col-lg-2'>
                    <div class='card' id="sing">
                        <img class='card-img-top' src="images.jpg" alt='Card image'>
                        <div class="card-body">
                            <h6>The night we met</h6>
                        </div>
                    </div>
                </div>
                <div class='col-lg-2'>
                    <div class='card' id="sing">
                        <img class='card-img-top' src="faultinourstars-soundtrack.jpg" alt='Card image'>
                        <div class="card-body">
                            <h6>All of the stars</h6>
                        </div>
                    </div>
                </div>
                <div class='col-lg-2'>
                    <div class='card' id="sing">
                        <img class='card-img-top' src="1_WKZVewH7xZQiy9jNKzpkuw.jpeg" alt='Card image'>
                        <div class="card-body">
                            <h6>Yummy</h6>
                        </div>
                    </div>
                </div>
                <div class='col-lg-2'>
                    <div class='card' id="sing">
                        <img class='card-img-top' src="x1080.jpg" alt='Card image'>
                        <div class="card-body">
                            <h6>Lovely</h6>
                        </div>
                    </div>
                </div>
                <div class='col-lg-2'>
                    <div class='card' id="sing">
                        <img class='card-img-top' src="MV5BZjE4ODllODctOGJkNy00N2MzLWJlYzYtNThlYmNhZjFiY2I2XkEyXkFqcGdeQXVyOTYxMzA0Mzk@._V1_.jpg" alt='Card image'>
                        <div class="card-body">
                            <h6>Without Me</h6>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>

</body>
</html>