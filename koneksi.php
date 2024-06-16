<?php
$servername = "localhost";
$username = "if0_36677311";
$password = "Cw3W0W1M9fgHTY";
$dbname = "if0_36677311_restoran";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

?>