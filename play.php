<?php
include('player.php');
$serverName = "localhost";
$username = "root";
$password = "";
$dbName = "music";
$conn = new mysqli($serverName,$username,$password,$dbName);

$queryName;
$queryTable;
$fetchQuery;
$fres;




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" text="text/css" href="play.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Spicy+Rice&display=swap" rel="stylesheet">
    <title>Document</title>
</head>

<body>
    <!-- <div class="mainContainer">
        <div class="jumbotron jumbotron-fluid" style="background: linear-gradient(to bottom, transparent 65%, rgba(0,0,0,0.8)), 
        url('1136124.jpg'); height:380px;
    object-fit:cover;
    background-size: cover;
    background-position:0px;" >
            <div class="container-fluid">
                <h1>Maroon 5</h1>
                <button>PLAY</button>
            </div>
        </div>
        <table>
            <?php
            $i=0;
            while($i<4){
            echo "<tr>";
                echo "<td id='td1'><i class='fa'>&#xf04b;</i></td>";
                echo "<td id='td2'><img src= ''></td>";
                echo "<td id='td3'><h4>Yummy</h4><p>Justin Bieber</p></td>";
                echo "<td id='td4'>03:40</td>";
            echo "</tr>";
            $i = $i+1;
            }
            ?>
        </table>
    </div> -->


<?php
if(isset($_GET['artist'])){
    $queryName = $_GET['artist'];
    $queryTable = 'artist';
    $fetchQuery= "select * from "."`".$queryTable."`"."where p_name = "."'".$queryName."'";
    if($fetchResult = $conn->query($fetchQuery)){
        $fres = $fetchResult->fetch_assoc();
    }
    else{
        echo "failed";
    }

    echo "<div class='mainContainer' style="."'"."background: linear-gradient(to top left, #000000 10%, ".$fres['color']."  100%);' >";
        echo "<div class='jumbotron jumbotron-fluid' style="."'"."background: linear-gradient(to bottom, transparent 65%, rgba(0,0,0,0.8)), url(" .$fres['Artist_cover_image']."); height:380px; object-fit:cover; background-size: cover; background-position:0px; '>";
            echo "<div class='container-fluid'>";
                echo "<h1>".$fres['Artist_name']."</h1>";
                echo "<button style='background-color:".$fres['color']."'>PLAY</button>";
            echo "</div>";
        echo "</div>";
        echo "<table>";
        $ar_id = $fres['Artist_id'];
        $songQuery = "select * from songs where artist_id = $ar_id";
        $songsResult = $conn->query($songQuery);
        $songsArray=Array();
        $sindex = 0;
            while($sres = $songsResult->fetch_assoc()){
                $songsArray []=$sres['song_address'];
            echo "<tr>";
            $sname = $sres['song_name'];
            $sartist = $fres['Artist_name'];
            $simage = $fres['Artist_image'];
            
                echo "<td id='td1'><i id='splay' class='fa' onclick='"."pla(`$sindex`,`$sartist`,`$simage`,`$sname`)'".">&#xf04b;</i><i id='spause' onclick='pau()' style='display:none' class='fa'>&#xf04c;</i></td>";
                echo "<td id='td2'><img src= ".$fres['Artist_image']."></td>";
                echo "<td id='td3'><h4>".$sres['song_name']."</h4><p>".$fres['Artist_name']."</p></td>";
                echo "<td id='td4'>03:40</td>";
                
            echo "</tr>";
            $sindex = $sindex+1;
            }
            
        echo "</table>";
        
    echo "</div>";
    
}


    if(isset($_GET['mood'])){
    $queryName = $_GET['mood'];
    $queryTable = 'playlist';
    $fetchQuery= "select * from "."`".$queryTable."`"."where p_name = "."'".$queryName."'";
    if($fetchResult = $conn->query($fetchQuery)){
        $fres = $fetchResult->fetch_assoc();
    }
    else{
        echo "falide";
    }

    echo "<div class='mainContainer' style="."'"."background: linear-gradient(to top left, #000000 10%, ".$fres['color']."  100%);' >";
        echo "<div class='jumbotron jumbotron-fluid' style="."'"."background: linear-gradient(to bottom, transparent 65%, rgba(0,0,0,0.8)), url(" .$fres['Playlist_cover_image']."); height:380px; object-fit:cover; background-size: cover; background-position:0px; '>";
            echo "<div class='container-fluid'>";
                echo "<h1>".$fres['playlist_name']."</h1>";
                echo "<button style='background-color:".$fres['color']."'>PLAY</button>";
            echo "</div>";
        echo "</div>";
        echo "<table>";
            $i=0;
            while($i<4){
            echo "<tr>";
                echo "<td id='td1'><i class='fa'>&#xf04b;</i></td>";
                echo "<td id='td2'><img src= ".$fres['playlist_image']."></td>";
                echo "<td id='td3'><h4>Yummy</h4><p>Justin Bieber</p></td>";
                echo "<td id='td4'>03:40</td>";
            echo "</tr>";
            $i = $i+1;
            }
            
        echo "</table>";
    echo "</div>";
        }
?>
<script>
   var currentIndex;
   function pla(x,y,z,w){
       currentIndex = x;
    var passedArray =  <?php echo json_encode($songsArray); ?>;
       console.log(passedArray);
       var g = document.getElementById('player');
       g.setAttribute('src',passedArray[x]);
       document.getElementById('pl').click();
       document.getElementById('player_title').innerHTML = w;
       document.getElementById('player_content').innerHTML = y;
       document.getElementById('player_image').src = z;
       document.getElementById('player_image').style.display = "block";
       document.getElementById('splay').style.display = "none";
       document.getElementById('spause').style.display = "block";
   }
   function pau(){
       document.getElementById('pa').click();
       document.getElementById('splay').style.display = "block";
       document.getElementById('spause').style.display = "none";
   }
   </script>
</body>
</html>