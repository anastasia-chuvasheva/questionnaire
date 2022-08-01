<?php

$questionnaireId = $_POST["questionnaire_id"];
$email = $_POST["email"];

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

$sql = "INSERT INTO `questionnaire_result` (questionnaire_id, email) VALUES ($questionnaireId,'$email')";

$result = $conn->query($sql);

if (!$result) {
    echo "Error: " . $sql . "<br>" . $conn->error;
    exit;
}

$sql = "SELECT * FROM `questionnaire_result` ORDER BY id DESC LIMIT 1";
$getResultIdResult = $conn->query($sql);
if (!$getResultIdResult) {
    echo "Error: " . $sql . "<br>" . $conn->error;
    exit;
}
$row = $getResultIdResult->fetch_assoc();
$result_id = $row["id"];

foreach ($_POST as $questionId => $optionId) {
   
    if (!is_numeric($questionId)) {
        continue;
    }

    $sql = "INSERT INTO `questionnaire_result_answer` (questionnaire_result_id, questionnaire_question_id, q_q_option_id)"
            . " VALUES ($result_id, $questionId, $optionId)";
    $result = $conn->query($sql);

    if (!$result) {
        echo "Error: " . $sql . "<br>" . $conn->error;
        exit;
    }
}
$conn->close();
header("Location: QuestionnaireResultSuccess.php?id=$questionnaireId");