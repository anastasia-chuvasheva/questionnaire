<?php

//echo "Congrats, the questionnaire was filled successfully!"."<br>";
//echo "We're gonna have counting features, too. Coming soon";

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

$questionnaireId = $_GET["id"];
$sql = "SELECT name from `questionnaire` where id=$questionnaireId";
$questionnaireNameResult = $conn->query($sql);
$row = $questionnaireNameResult->fetch_assoc();
$questionnaireName = $row['name'];
echo "<b>$questionnaireName</b>.<br><br>";

$sql = "SELECT id, question FROM questionnaire_question WHERE questionnaire_id = $questionnaireId";
$QuestionIdsResult = $conn->query($sql);
if (!$QuestionIdsResult) {
    echo "Error: " . $sql . "<br>" . $conn->error;
    exit;
}
while ($idRow = $QuestionIdsResult->fetch_assoc()) {
    $questionId = $idRow["id"];
    $questionName = $idRow["question"];
    $sql = "SELECT COUNT(*) AS 'count' FROM `questionnaire_result_answer` WHERE questionnaire_question_id=$questionId";
    $questionResultResult = $conn->query($sql);
    if (!$questionResultResult) {
        echo "Error: " . $sql . "<br>" . $conn->error;
        exit;
    }
    $row = $questionResultResult->fetch_assoc();
    $allAnswersCount = $row['count'];

    $sql = "SELECT id, option FROM q_q_option WHERE questionnaire_question_id=$questionId";
    $answersIdsResult = $conn->query($sql);
    if (!$answersIdsResult) {
        echo "Error: " . $sql . "<br>" . $conn->error;
        exit;
    }
    echo "<br>";
    echo "$questionName<br><br>";
    while ($answerIdRow = $answersIdsResult->fetch_assoc()) {
        $answerId = $answerIdRow['id'];
        $answerName = $answerIdRow['option'];
        $sql = "SELECT COUNT(*) as 'count' FROM `questionnaire_result_answer` WHERE q_q_option_id=$answerId";
        $singleAnswerCountResult = $conn->query($sql);
        $singleAnswerCountRow = $singleAnswerCountResult->fetch_assoc();
        $singleAnswerCount = $singleAnswerCountRow['count'];
        $int = $singleAnswerCount / $allAnswersCount;
        echo "<i>$answerName   ".round($int * 100, 2) . "%"."<br></i>";
        
    }
} ?>

<html>
    <br>
     <button onclick="window.location.href='Forum/Pages/MainPage.php'">
      Discuss results
    </button>
</html>

<?php
///Forum/Pages/MainPage.php
//$sql = "SELECT questionnaire_result.`questionnaire_id`, questionnaire_result_answer.questionnaire_question_id,COUNT(q_q_option_id) AS 'count'" .
//        " FROM `questionnaire_result_answer`" .
//        " INNER JOIN questionnaire_result ON questionnaire_result.`id`= questionnaire_result_answer.`questionnaire_result_id`" .
//        " WHERE questionnaire_result.`questionnaire_id`=$questionnaireId" .
//        " GROUP BY questionnaire_question_id";

//$sumResult = $conn->query($sql);
//
//if (!$sumResult) {
//    echo "Error: " . $sql . "<br>" . $conn->error;
//    exit;
//}

//var_dump($sumResult->fetch_assoc());
//exit;

//while ($sumRow = $sumResult->fetch_assoc()) {
//    $questionId = $sumRow["questionnaire_question_id"];
//    $sql = "SELECT DISTINCT q_q_option_id FROM `questionnaire_result_answer`" .
//            " WHERE questionnaire_question_id = $questionId";
//    $uniqueOptionIdsResult = $conn->query($sql);
//    while ($singleAnswerRow = $uniqueOptionIdsResult->fetch_assoc()) {
//        $optionId = $singleAnswerRow["q_q_option_id"];
//        $sql = "SELECT questionnaire_result.`questionnaire_id`," .
//                " questionnaire_result_answer.questionnaire_question_id, q_q_option_id, COUNT(q_q_option_id) AS 'countAnswer'" .
//                " FROM `questionnaire_result_answer`" .
//                " INNER JOIN questionnaire_result ON questionnaire_result.`id`= questionnaire_result_answer.`questionnaire_result_id`" .
//                " WHERE questionnaire_result_answer.`q_q_option_id`=$optionId" .
//                " GROUP BY `q_q_option_id`";
//        $singleAnswerCountResult = $conn->query($sql);
//        $singleAnswerCountRow = $sumResult->fetch_assoc();
//        $countAnswer = $singleAnswerCountRow["count"];
//        var_dump($countAnswer);
//        while ($sumRow = $sumResult->fetch_assoc()) {
//            $count = $sumRow["count"];
//            $questionIdFromSum = $sumRow["questionnaire_question_id"];
//            if ($questionIdFromSum == $singleAnswerCountRow["questionnaire_question_id"]) {
//                $int = $countAnswer / $count;
//                echo round($int * 100) . "%";
//            }
//        }
//    }
//}
//
//
//
//

//while ($sumResult->fetch_assoc()) {
//    $count = $row["count"];
//}
?>