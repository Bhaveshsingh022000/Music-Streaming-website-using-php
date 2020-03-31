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
<body>
    <div class="mainContainer">
        <ul id="navbar" class="nav justify-content-center">
        <li class="nav-item">
        <a class="nav-link" href="#">HOME</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="#">DISCOVER</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="#">TRENDING</a>
        </li>
        </ul>
        <div class="container-fluid">
            <?php
                $serverName = "localhost";
                $username = "root";
                $password = "";
                $dbName = "music";
                $conn = new mysqli($serverName,$username,$password,$dbName);

                $queryArtist = 'select collection_title.collection_name, artist.Artist_name, artist.Artist_image from collection_title inner join collection on collection.collection_title_id = collection_title.collection_title_id inner join artist on collection.artist_id = artist.Artist_id';
                $resultArtist = $conn->query($queryArtist);
                $artist = array();
                while($f = $resultArtist->fetch_assoc()){$artist [] = $f;}
                echo "<h2>".$artist[0]['collection_name']."</h2>";
                echo "<div class='row'>";
                foreach($artist as $r){
                echo "<div class='col-lg-2'>";
                echo "<div class='card' >";
                echo "<img class='card-img-top' src=".$r['Artist_image']." alt='Card image'>";
                echo "<div class='card-body'>";
                echo "<h5 class='card-title'>Selena Gomez</h5>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
                }
                echo "</div>";
            ?>
            <div class="row">
                <!-- <div class='col-lg-2'>
                    <div class='card' >
                        <img class='card-img-top' src="221-2216666_hd-selena-gomez-wallpapers-desktop-cute-selena-gomez.jpg" alt='Card image'>
                        <div class='card-body'>
                            <h5 class='card-title'>Selena Gomez</h5>
                        </div>
                    </div>
                </div>
                <div class='col-lg-2'>
                    <div class='card' >
                        <img class='card-img-top' src="Billie-Eilish-debut-album-e1554050828895.jpg" alt='Card image'>
                        <div class='card-body'>
                            <h5 class='card-title'>Billie Eilish</h5>
                        </div>
                    </div>
                </div>
                <div class='col-lg-2'>
                    <div class='card' >
                        <img class='card-img-top' src="TheWeekndHeartlessVideo.jpg" alt='Card image'>
                        <div class='card-body'>
                            <h5 class='card-title'>The Weeknd</h5>
                        </div>
                    </div>
                </div>
                <div class='col-lg-2'>
                    <div class='card' >
                        <img class='card-img-top' src="halsey.jpg" alt='Card image'>
                        <div class='card-body'>
                            <h5 class='card-title'>Halsey</h5>
                        </div>
                    </div>
                </div>
                <div class='col-lg-2'>
                    <div class='card' >
                        <img class='card-img-top' src="ed-sheeran-press-photo-2018-1519211115-editorial-long-form-0.png" alt='Card image'>
                        <div class='card-body'>
                            <h5 class='card-title'>Ed Sheeran</h5>
                        </div>
                    </div>
                </div>
                <div class='col-lg-2'>
                    <div class='card' >
                        <img class='card-img-top' src="justinbieberyummy.jpg" alt='Card image'>
                        <div class='card-body'>
                            <h5 class='card-title'>Justin Bieber</h5>
                        </div>
                    </div>
                </div> -->
            </div>


            <h2>Mood</h2>
            <div class="row">
                <div class='col-lg-2'>
                    <div class='card' id="mood">
                        <img class='card-img-top' src="lovethestars.jpg" alt='Card image'>
                        <div class="card-body">
                            <h6>Warm Fuzzy Feelings</h6>
                        </div>
                    </div>
                </div>
                <div class='col-lg-2'>
                    <div class='card' id="mood">
                        <img class='card-img-top' src="56-569654_wallpaper-mood-children-child-girl-legs-shoes-happy.jpg" alt='Card image'>
                        <div class="card-body">
                            <h6>Happiness Pills</h6>
                        </div>
                    </div>
                </div>
                <div class='col-lg-2'>
                    <div class='card' id="mood">
                        <img class='card-img-top' src="workout-gym-bodybuilder-wallpaper-preview.jpg" alt='Card image'>
                        <div class="card-body">
                            <h6>Workout Beats</h6>
                        </div>
                    </div>
                </div>
                <div class='col-lg-2'>
                    <div class='card' id="mood">
                        <img class='card-img-top' src="Woman-Shopping-Online-790x380-1.jpeg" alt='Card image'>
                        <div class="card-body">
                            <h6>Coffee & Chill</h6>
                        </div>
                    </div>
                </div>
                <div class='col-lg-2'>
                    <div class='card' id="mood">
                        <img class='card-img-top' src="a-sad-woman-looking-out-of-the-window.jpg" alt='Card image'>
                        <div class="card-body">
                            <h6>Sad Beats</h6>
                        </div>
                    </div>
                </div>
                <div class='col-lg-2'>
                    <div class='card' id="mood">
                        <img class='card-img-top' src="unnamed.jpg" alt='Card image'>
                        <div class="card-body">
                            <h6>Acoustic Chill</h6>
                        </div>
                    </div>
                </div>
                
            </div>

            <h2>Sing Along</h2>
            <div class="row">
                <div class='col-lg-2'>
                    <div class='card' id="sing">
                        <img class='card-img-top' src="220px-Benny_Blanco,_Halsey_and_Khalid_Eastside.png" alt='Card image'>
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