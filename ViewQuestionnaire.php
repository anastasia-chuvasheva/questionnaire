<html>
    <head>
        <meta charset="UTF-8">
        <title>
            Questionnaire
        </title>
    </head>
    <body>
        <h1>
            Congratulations, your questionnaire was successfully created.
        </h1>
        <h2>
            Here you can correct its name and go to a page where questions can be added and shown.
        </h2>
        <div>
            <form action="QuestionnaireUpdate.php" method="post" >
                <input id="questionnaire_name" name="questionnaire_name" type="text" 
                       value ="<?php echo $name; ?>">
                <input id="id" name="id" value="<?php echo $id; ?>" type="hidden">
                <input type="submit" value="Update">
                <br>
                <input type="reset" class="button1" id="button1">
            </form>
            <br>
            <form action = "ViewQuestion.php?id=<?php echo $id; ?>" method="post">
                <input id="id" name="id" value="<?php echo $id; ?>" type="hidden">
                <input type="submit" value="Questions">
            </form>
        </div>
</html>
<?php

