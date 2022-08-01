<?php

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

$id = $_GET["id"];

$name = $_GET["question_name"];
$sql = "UPDATE `questionnaire_question` set question='$name' where id=$id";

if ($conn->query($sql) === false) {
    echo "Error: " . $sql . "<br>" . $conn->error;
    exit;
}
$sql = "SELECT questionnaire_id FROM `questionnaire_question` where id=$id";
$result = $conn->query($sql);

if (!$result) {
    echo "Error: " . $sql . "<br>" . $conn->error;
    exit;
}
$row = $result->fetch_assoc();
$questionnaire_id = $row["questionnaire_id"];



$conn->close();
header("Location:ViewQuestion.php?id=$questionnaire_id");

