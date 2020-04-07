<?php
session_start();
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
        <!-- <input class="search" type="search" placeholder="Search" name='search' /> -->
<?php
$userPlatlistQuery ="select songs.song_name,songs.song_address ,artist.Artist_name,artist.Artist_image FROM user_playlist INNER JOIN songs on songs.song_id = user_playlist.song_id 
INNER JOIN artist on artist.Artist_id = songs.artist_id 
WHERE user_playlist.user_id = ".$_SESSION['user_id'];
                        $result = $conn->query($userPlatlistQuery);

        echo "<table>";
        $sindex = 0;
        $songsArray=Array();
        $simage = Array();
        $sartist = Array();
        $sname = Array();
        $sindex = 0;
            while($sres = $result->fetch_assoc()){
                $songsArray []=$sres['song_address'];
                $songsNameArray []=$sres['song_name'];
            echo "<tr class='tableRow'>";
            $sname[] = $sres['song_name'];
            $sartist[] = $sres['Artist_name'];
            $simage []= $sres['Artist_image'];
            
                echo "<td id='td1' class='songBtn'><i  class='fa splay' onclick='"."pla(`$sindex`,`$sartist[$sindex]`,`$simage[$sindex]`,`$sname[$sindex]`)'".">&#xf04b;</i><i  onclick='pau()' style='display:none' class='fa spause'>&#xf04c;</i></td>";
                echo "<td id='td2'><img src= ".$sres['Artist_image']."></td>";
                echo "<td id='td3' class='songName'><h4>".$sres['song_name']."</h4><p>".$sres['Artist_name']."</p></td>";
                echo "<td id='td4' class='songTime'>03:40</td>";
                
                
            echo "</tr>";
            $sindex = $sindex+1;
            }
        echo "</table>";


?>
    </div>
</body>
</html>