<?php

$id = $_REQUEST["id"];

$questionName = $_GET["question_name"];

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

$sql = "INSERT INTO `questionnaire_question` (question, questionnaire_id) VALUES ('$questionName',$id)";

$result = $conn->query($sql);

if ($result){
    $questionId = $conn->insert_id; 
}

if (!$result) {
  echo "Error: " . $sql . "<br>" . $conn->error;
  exit;
}

$conn->close();
header("Location: ViewQuestion.php?id=$id");



