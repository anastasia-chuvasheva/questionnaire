<?php
$id = $_REQUEST["id"];

?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>
            Create answer
        </title>
    </head>
    <body>
        <h1>
            Enter an answer here:
        </h1>
        <div>
            <form action="AnswerCreate.php" method="post">
                <input id="id" name="id" value="<?php echo $id; ?>" type="hidden">
                <input id="option" name="option" type="text">
                <br><br>
                <input type="submit">
                <input type="reset" class="button1" id="button1">
            </form>
        </div>
        
    </body>
    
</html>
<?php

