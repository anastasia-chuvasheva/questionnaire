<div>
    <?php
    echo $row["question"]."<br><br>";
    $questionId = $row["id"];
    $sql = "SELECT * FROM q_q_option WHERE questionnaire_question_id = $questionId";
    $questionResult = $conn->query($sql);
    while ($answerRow = $questionResult->fetch_assoc()) {
        include 'C:\xampp\htdocs\Question\ViewEntireThingAnswerForm.php';
    };
    ?> 
    <br>
</div>


