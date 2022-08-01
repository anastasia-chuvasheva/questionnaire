<?php

$name = $_GET["questionnaire_name"];

$servername = "localhost";
$dbname = "question";
$username = "root";
$password = "password";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO `questionnaire` (name) VALUES ('$name')";

$result = $conn->query($sql);
if ($result){
    $id = $conn->insert_id; 
}

if (!$result) {
  echo "Error: " . $sql . "<br>" . $conn->error;
  exit;
}

//I need to write functionality to check if the name already exists in the database

$conn->close();
header("Location: QuestionnaireUpdate.php?id=$id");