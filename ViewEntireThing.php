
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
$sql = "SELECT * FROM questionnaire WHERE id = $id";
$result = $conn->query($sql);

if (!$result) {
    echo "Error: " . $sql . "<br>" . $conn->error;
    exit;
}
$row = $result->fetch_assoc();
$questionnaireName = $row["name"];
?>

<html>
    <h1> <?php echo $questionnaireName; ?> </h1>
    <form action="QuestionnaireResult.php" method="post">
        <?php
        $sql = "SELECT * FROM questionnaire_question WHERE questionnaire_id = $id";
        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc()) {
            include 'C:\xampp\htdocs\Question\ViewEntireThingQuestionForm.php';
        }
        ?>
        <label for="email"> Enter your e-mail here: </label>
        <input type="email" required id="email" name="email" placeholder="test@test.com" minlength="10" >
               <!--pattern="/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+S@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/">-->
        <br><br>
        <input value="<?php echo $id; ?>" type="hidden" id="<?php echo $id; ?>" 
               name="questionnaire_id" >
        <input type="submit" value="Submit">
    </form>



