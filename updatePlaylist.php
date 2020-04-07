<?php
session_start();
$serverName = "localhost";
$username = "root";
$password = "";
$dbName = "music";
$conn = new mysqli($serverName,$username,$password,$dbName);
$song_id = $_GET['q'];
// echo $song_id;
$user_id =  $_SESSION["user_id"];
$inserQuery = "insert into user_playlist(song_id,user_id) values('$song_id','$user_id')";
$conn->query($inserQuery);
?>