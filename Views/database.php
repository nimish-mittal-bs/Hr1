<?php
$servername = "localhost";
$username = "root";
$password = "Bigstep@123";
$dbname = "2assement";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
//echo "connection sucessfull";
?>