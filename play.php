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
if(isset($_GET['artist'])){
    $queryName = $_GET['artist'];
    $queryTable = 'artist';
    $fetchQuery= "select * from "."`".$queryTable."`"."where p_name = "."'".$queryName."'";
    if($fetchResult = $conn->query($fetchQuery)){
        $fres = $fetchResult->fetch_assoc();
    }
    else{
        echo "falide";
    }
}


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
    <!-- <div class="mainContainer" style="background: linear-gradient(to top left, #000000 10%, <?php echo $fres['color']; ?> 100%);">
        <div class="jumbotron jumbotron-fluid" style="background: linear-gradient(to bottom, transparent 65%, rgba(0,0,0,0.8)), 
        url(<?php echo $fres['Artist_cover_image']; ?>); height:380px;
    object-fit:cover;
    background-size: cover;
    background-position:0px;" >
            <div class="container-fluid">
                <h1><?php echo $fres['Artist_name'];?></h1>
                <button style="background-color: <?php echo $fres['color'];?>">PLAY</button>
            </div>
        </div>
        <table>
            <?php
            $i=0;
            while($i<4){
            echo "<tr>";
                echo "<td id='td1'><i class='fa'>&#xf04b;</i></td>";
                echo "<td id='td2'><img src= ".$fres['Artist_image']."></td>";
                echo "<td id='td3'><h4>Yummy</h4><p>Justin Bieber</p></td>";
                echo "<td id='td4'>03:40</td>";
            echo "</tr>";
            $i = $i+1;
            }
            ?>
        </table>
    </div> -->


    <div class="mainContainer">
        <div class="jumbotron jumbotron-fluid">
            <div class="container-fluid">
                <h1>Acoustic Chill</h1>
                <button>PLAY</button>
            </div>
        </div>
        <table>
            <?php
            $i=0;
            while($i<4){
            echo "<tr>";
                echo "<td id='td1'><i class='fa'>&#xf04b;</i></td>";
                echo "<td id='td2'><img src= ".$fres['Artist_image']."></td>";
                echo "<td id='td3'><h4>Yummy</h4><p>Justin Bieber</p></td>";
                echo "<td id='td4'>03:40</td>";
            echo "</tr>";
            $i = $i+1;
            }
            ?>
        </table>
    </div>
</body>
</html>