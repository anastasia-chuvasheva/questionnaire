<?php
$topic_id =$_POST['topic_id'];
?>

<html>
    <head>
        <title>
            2 Cents Creator
        </title>
    <body>
        <h1>
            You have an opinion, right? 
        </h1>
        <div>
            <form action="CommentCreate.php" method="get">
                
                <div><label for="comment"> Add your valuable contribution here: </label></div>
                <textarea name="comment" rows=4 cols=20 id="comment" wrap="virtual" type="text" 
                          maxlength=150></textarea> 
                <input id="timestamp" name="timestamp" type="hidden"  value= "<?php echo date('Y-m-d H:i:s');?>">
                <input id="topic_id" name="topic_id" type="hidden"  value= "<?php echo $topic_id;?>">
                <br>
                <input type="submit">
                <input type="reset" class="button1" id="button1">
            </form>
        </div>
</html>


