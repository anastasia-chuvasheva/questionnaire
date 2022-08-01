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

$sql = "SELECT questionnaire_question_id FROM `q_q_option` where id=$id";
$result = $conn->query($sql);

if (!$result) {
    echo "Error: " . $sql . "<br>" . $conn->error;
    exit;
}
$row = $result->fetch_assoc();
$QQid = $row["questionnaire_question_id"];

$sql = "DELETE FROM `q_q_option` where id=$id";
$result = $conn->query($sql);

if ($conn->query($sql) === false) {
    echo "Error: " . $sql . "<br>" . $conn->error;
    exit;
}

$conn->close();
header("Location:ViewAnswers.php?id=$QQid");