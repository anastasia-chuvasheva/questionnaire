<?php
$id = $_REQUEST["id"];
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>
            Create question
        </title>
    </head>
    <body>
        <h1>
            Enter a question here:
        </h1>
        <div>
            <form action="QuestionCreate.php?id=<?php echo $id; ?>" method="get">
                <input id="id" name="id" value="<?php echo $id; ?>" type="hidden">
                <input id="question_name" name="question_name" type="text">
                <br><br>
                <input type="submit">
                <input type="reset" class="button1" id="button1">
            </form>
        </div>
        
    </body>
    
</html>
<?php

