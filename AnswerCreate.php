<?php

$id = $_REQUEST["id"];

$answerName = $_REQUEST["option"];

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

$sql = "INSERT INTO `q_q_option` (option, questionnaire_question_id) VALUES ('$answerName',$id)";

$result = $conn->query($sql);

if ($result){
    $questionId = $conn->insert_id; 
}

if (!$result) {
  echo "Error: " . $sql . "<br>" . $conn->error;
  exit;
}

$conn->close();
header("Location: ViewAnswers.php?id=$id");