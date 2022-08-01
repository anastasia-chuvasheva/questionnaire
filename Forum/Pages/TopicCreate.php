<?php

$name = ucfirst(strtolower(strip_tags($_GET["name"])));
if (is_numeric(strpos($name, "'", 0))){
    $number = strpos($name, "'", 0);
    $name = substr_replace($name, "'", $number, 0);
}
$description = ucfirst(strtolower(strip_tags($_GET["description"])));
if (is_numeric(strpos($description, "'", 0))){
    $number = strpos($description, "'", 0);
    $description = substr_replace($description, "'", $number, 0);
}
$creator = $_GET["creator"];
$timestamp = $_GET["timestamp"];

$servername = "localhost";
$dbname = "forum";
$username = "root";
$password = "password";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql ="INSERT INTO `topic` (name, description, creator, timestamp ) VALUES ('$name', '$description','$creator','$timestamp')";

$result = $conn->query($sql);

if (!$result) {
  echo "Error: " . $sql . "<br>" . $conn->error;
  exit;
}

$conn->close();
header("Location: MainPage.php");

