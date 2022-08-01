<div>
    <form action="AnswerUpdate.php" method="get" >
        <input id="option" name="option" type="text" 
               value ="<?php echo $row["option"]; ?>">
        <input id="id" name="id" value="<?php echo $row["id"]; ?>" type="hidden">
        <input type="submit" value="Update">
    </form>
    <form action="AnswerRemove.php" method="get" >
        <input id="id" name="id" value="<?php echo $row["id"]; ?>" type="hidden">
        <input type="submit" value="Remove">
    </form>
</div>