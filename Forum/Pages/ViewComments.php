<?php
$topic_id = $_REQUEST["topic_id"];

$servername = "localhost";
$dbname = "forum";
$username = "root";
$password = "password";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM `topic` WHERE id=$topic_id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

$name = $row["name"];
$description = $row["description"];
?>
<html>
    <div
        <p> <b> <?php echo $row["name"]; ?> </b> </p>
    <p> <?php echo $row["description"]; ?> </p>
</html>

<?php
$sql = "SELECT * FROM `comment` WHERE topic_id=$topic_id";
$result = $conn->query($sql);

while ($row = $result->fetch_assoc()) {

    echo "<i><b>" . $row['comment'] . "</i></b>" . "   was added at " . $row['timestamp'] . "<br>";
}
?>
<html>
    <br>
    <form action = "CommentCreateForm.php" method="post">
        <input id="topic_id" name="topic_id" value="<?php echo $_REQUEST["topic_id"]; ?>" type="hidden">
        <input type="submit" value="Add Your 2 Cents">
    </form>

