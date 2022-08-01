<?php
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
$topic_id = $row['id'];

$sql = "SELECT count(*) AS `count` FROM `comment` where topic_id=$topic_id";
$resultCount = $conn->query($sql);
$rowCount = $resultCount->fetch_assoc();
$count = $rowCount["count"];
?>
<div
    <p> <b> <?php echo $row["name"]; ?> </b> </p>
<p> <?php echo $row["description"]; ?> </p>
<p> created by <i> <?php echo $row["creator"]; ?></i> at <?php echo $row["timestamp"]; ?> </p>
<p> <?php
    if ($count > 0) {
        echo "number of comments is $count";
    } else {
        echo "this topic has no comments";
    }
    ?> </p>
<form action="ViewComments.php" method="post" >
    <input id="topic_id" name="topic_id" value="<?php echo $topic_id; ?>" type="hidden">
    <input type="submit" value="Discuss">
</form>
</div>

