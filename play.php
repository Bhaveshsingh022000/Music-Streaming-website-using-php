<?php
$a = 'a.mp3';
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
    <div class="mainContainer">
        <div class="jumbotron jumbotron-fluid">
            <div class="container-fluid">
                <h1>Justin Bieber</h1>
                <button>PLAY</button>
            </div>
        </div>
        <table>
            <?php
            $i=0;
            while($i<4){
            echo "<tr>";
                echo "<td id='td1'><i class='fa'>&#xf04b;</i></td>";
                echo "<td id='td2'><img src='images.jpg'></td>";
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