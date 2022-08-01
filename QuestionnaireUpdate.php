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

$id = $_REQUEST["id"];

if (empty($_POST)) {
    $sql = "SELECT * FROM `questionnaire` where id=$id";
    $result = $conn->query($sql);
        
       $row = $result->fetch_assoc();
       $name = $row["name"];
    include 'ViewQuestionnaire.php';
    exit;
}

$name =$_POST["questionnaire_name"];
$sql = "UPDATE `questionnaire` set name='$name' where id=$id";

if ($conn->query($sql) === false) {
    echo "Error: " . $sql . "<br>" . $conn->error;
    exit;
}

$conn->close();
header("Location:QuestionnaireUpdate.php?id=$id");
?>
