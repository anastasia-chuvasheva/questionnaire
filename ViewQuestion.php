<?php
$id = $_GET["id"];

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

$sql = "SELECT * FROM `questionnaire_question` WHERE questionnaire_id = $id";
$result = $conn->query($sql);

?>

<html>
    <head>
        <title>
            Show question (update/add/add answers)
        </title>
    </head>
    <body>
        <h1>
            On this page you can update question names, add questions and add possible answers to them.
        </h1>
        <div>
            <?php
               while ($row = $result->fetch_assoc()) {
                   include 'C:\xampp\htdocs\Question\ViewQuestionUpdateForm.php';
               };
               ?> 
            <br>
            <form action = "QuestionCreateForm.php" method="post">
                <input id="id" name="id" value="<?php echo $_REQUEST["id"]; ?>" type="hidden">
                <input type="submit" value="Add Questions">
            </form>
            <br>
        </div>
    </body>
</html>

<?php

