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

$sql = "SELECT * FROM `topic`";
$result = $conn->query($sql);
?>
<html>
    <head>
        <title>
            Main page
        </title>
    <body>
        <h1>
            Welcome to our forum! Here you can discuss anything related to our questionnaires. 
        </h1>
        <p>
        <div>
            <?php
            while ($row = $result->fetch_assoc()) {
                include 'C:\xampp\htdocs\Question\Forum\Pages\ViewTopicsForm.php';
            };
            ?> 
            <br>
            <form action = "TopicCreateForm.php" method="post">
                <input id="topic_id" name="topic_id" value="<?php echo $row["id"]; ?>" type="hidden">
                <input type="submit" value="Add A Topic">
            </form>
            <br>
        </div>
    </p>
</body>
</head>



</html>
<?php

