<?php
$id = $_REQUEST["id"];

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

$sql = "SELECT * FROM `q_q_option` WHERE questionnaire_question_id = $id";
$result = $conn->query($sql);
?>
<html>
    <head>
        <title>
            Show answers (update/add answers)
        </title>
    </head>
    <body>
        <h1>
            On this page you can add and update answers to the questions.
        </h1>
        <div>
            <?php
               while ($row = $result->fetch_assoc()) {
                   include 'C:\xampp\htdocs\Question\ViewAnswersUpdateForm.php';
               };
               ?> 
            <br>
            <form action = "AnswerCreateForm.php" method="get">
                <input id="id" name="id" value="<?php echo $id; ?>" type="hidden">
                <input type="submit" value="Add Answers">
            </form>
            <br>
        </div>
    </body>
</html>



