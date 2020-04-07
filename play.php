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
        url('225500.jpg'); height:380px;
    object-fit:cover;
    background-size: cover;
    background-position:0px;" >
            <div class="container-fluid">
                <h1>Eminem</h1>
                <button>PLAY</button>
            </div>
        </div>
        <table>
            <?php
            $i=0;
            while($i<4){
            echo "<tr>";
                echo "<td id='td1'><i class='fa'>&#xf04b;</i></td>";
                echo "<td id='td2'><img src= 'Eminem-2.jpeg'></td>";
                echo "<td id='td3'><h4>Yummy</h4><p>Justin Bieber</p></td>";
                echo "<td id='td4'>03:40</td>";
            echo "</tr>";
            $i = $i+1;
            }
            ?> -->
        </table>
    </div>


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
                echo "<button onclick='playAll()' style='background-color:".$fres['color']."'>PLAY</button>";
            echo "</div>";
        echo "</div>";
        echo "<table>";
        $ar_id = $fres['Artist_id'];
        $songQuery = "select * from songs where artist_id = $ar_id";
        $songsResult = $conn->query($songQuery);
        $songsArray=Array();
        $simage = Array();
        $sartist = Array();
        $sname = Array();
        $sindex = 0;
            while($sres = $songsResult->fetch_assoc()){
                $songsArray []=$sres['song_address'];
                $songsNameArray []=$sres['song_name'];
            echo "<tr class='tableRow'>";
            $sname[] = $sres['song_name'];
            $sartist[] = $fres['Artist_name'];
            $simage[] = $fres['Artist_image'];
            
                echo "<td id='td1' class='songBtn'><i  class='fa splay' onclick='"."pla(`$sindex`,`$sartist[$sindex]`,`$simage[$sindex]`,`$sname[$sindex]`)'".">&#xf04b;</i><i  onclick='pau()' style='display:none' class='fa spause'>&#xf04c;</i></td>";
                echo "<td id='td2'><img src= ".$fres['Artist_image']."></td>";
                echo "<td id='td3' class='songName'><h4>".$sres['song_name']."</h4><p>".$fres['Artist_name']."</p></td>";
                echo "<td id='td4' class='songTime'>03:40</td>";
                
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
                echo "<button onclick='playAll()' style='background-color:".$fres['color']."'>PLAY</button>";
            echo "</div>";
        echo "</div>";
        echo "<table>";
            $sindex = 0;
            $queryplaylist = "select playlist.playlist_name, songs.song_name, songs.song_address, artist.Artist_image, artist.Artist_name from playlist 
            inner join playlist_songs on playlist_songs.playlist_id = playlist.playlist_id INNER JOIN songs on playlist_songs.song_id = songs.song_id 
            inner JOIN artist on songs.artist_id = artist.Artist_id where playlist.p_name='".$queryName."'";
            $songsResult = $conn->query($queryplaylist);
        $songsArray=Array();
        $simage = Array();
        $sartist = Array();
        $sname = Array();
        $sindex = 0;
            while($sres = $songsResult->fetch_assoc()){
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
                echo "<td id='td5'><button type='submit' onclick='userPlaylist'><i class='fa'>&#xf0fe;</i></button></td>";
                
            echo "</tr>";
            $sindex = $sindex+1;
            }
            
        echo "</table>";
    echo "</div>";
        }
?>
<script>
    function autoNext() {
  setInterval(function(){ 
      var u = document.getElementById('player');
      if(u.currentTime == u.duration){
          forw();
      } 
    }, 3000);
}

function playAll(){
    document.getElementsByClassName('splay')[0].click();
}

var prevIndex = 0;
   var currentIndex = 0;
   var currentImage=<?php echo json_encode($simage); ?>;
   var currentTitle=<?php echo json_encode($sartist); ?>;
   var currentContent;
   
   function pla(x,y,z,w){
      console.log(currentImage);
       $('.songName').css('color','white');
       $('.songBtn').css('color','white');
       $('.songTime').css('color','white');
       $('.tableRow').css('background-color','');
       $('.splay').css('display','block');
       $('.spause').css('display','none');
        currentIndex = x;
        var passedArray =  <?php echo json_encode($songsArray); ?>;
        
        currentContent = <?php echo json_encode($songsNameArray); ?>;
        // console.log(currentContent);
        var g = document.getElementById('player');
        g.setAttribute('src',passedArray[x]);
        document.getElementById('pl').click();
        document.getElementById('player_title').innerHTML = w;
        document.getElementById('player_content').innerHTML = y;
        document.getElementById('player_image').src = z;
        document.getElementsByClassName('songName')[x].style.color = '#41e23e';
        document.getElementsByClassName('songTime')[x].style.color = '#41e23e';
        document.getElementsByClassName('songBtn')[x].style.color = '#41e23e';
        document.getElementsByClassName('tableRow')[x].style.backgroundColor = '#5a5656';
        document.getElementById('player_image').style.display = "block";
        document.getElementsByClassName('splay')[x].style.display = "none";
        document.getElementsByClassName('spause')[x].style.display = "block";
        autoNext();      
       
   }
   
   function pau(){
       document.getElementById('pa').click();
       document.getElementsByClassName('splay')[currentIndex].style.display = "block";
       document.getElementsByClassName('spause')[currentIndex].style.display = "none";
   }
   function forw(){
       var totalIndex = <?php echo json_encode($sindex); ?>;
       console.log('total - '+totalIndex);
       if(currentIndex==totalIndex-1){
           console.log('inside if');
        var temp;
       currentIndex = 0;
       temp = currentIndex;
       console.log(currentContent[temp]);
       console.log('image'+currentImage);
       console.log('title '+currentTitle);
       pla(currentIndex,currentContent[temp],currentImage[temp],currentTitle[temp]);
       }
       else{var temp;
       currentIndex = parseInt(currentIndex)+1;
       temp = currentIndex;
       console.log(currentContent[temp]);
       console.log('image'+currentImage);
       console.log('title '+currentTitle);
       pla(currentIndex,currentContent[temp],currentImage[temp],currentTitle[temp]);
       }
   }
   function back(){
       if(currentIndex==0){
           console.log('inside if');
        var temp;
       currentIndex = 0;
       temp = currentIndex;
       console.log(currentContent[temp]);
       console.log('image'+currentImage);
       console.log('title '+currentTitle);
       pla(currentIndex,currentContent[temp],currentImage[temp],currentTitle[temp]);
       }
       else{var temp;
       currentIndex = parseInt(currentIndex)-1;
       temp = currentIndex;
       console.log(currentContent[temp]);
       console.log('image'+currentImage);
       console.log('title '+currentTitle);
       pla(currentIndex,currentContent[temp],currentImage[temp],currentTitle[temp]);
       }
   }
   </script>
</body>
</html>