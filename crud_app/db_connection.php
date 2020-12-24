<?php
$servername = "localhost";
$usern = "root";
$passw = "";
$db_name = "you tube";

// Create connection
$conn = mysqli_connect($servername, $usern, $passw, $db_name);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>