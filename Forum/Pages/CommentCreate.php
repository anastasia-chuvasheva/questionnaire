<?php

$topic_id = $_GET["topic_id"];
$comment = $_GET["comment"];
//$comment = ucfirst(strtolower(strip_tags($_GET["comment"])));
//if (is_numeric(strpos($comment, "'", 0))){
//    $number = strpos($comment, "'", 0);
//    $comment = substr_replace($comment, "'", $number, 0);
//}
$comment = str_replace("'", "\'", $comment);
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

$sql ="INSERT INTO `comment` (topic_id, comment, timestamp ) VALUES ($topic_id,'$comment','$timestamp')";

$result = $conn->query($sql);

if (!$result) {
  echo "Error: " . $sql . "<br>" . $conn->error;
  exit;
}

$conn->close();
header("Location: ViewComments.php?topic_id=$topic_id");

