<div>
    <form action="QuestionUpdate.php" method="get" >
        <input id="question_name" name="question_name" type="text" 
               value ="<?php echo $row["question"]; ?>">
        <input id="id" name="id" value="<?php echo $row["id"]; ?>" type="hidden">
        <input type="submit" value="Update">
        </form>
        <form action="QuestionRemove.php" method="get" >
        <input id="id" name="id" value="<?php echo $row["id"]; ?>" type="hidden">
        <input type="submit" value="Remove">
        </form>
    <form action = "ViewAnswers.php" method="get">
        <input id="id" name="id" value="<?php echo $row["id"]; ?>" type="hidden">
        <input type="submit" value="Answers">
    </form>
</div>