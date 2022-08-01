<html>
    <head>
        <title>
            Topic Creator
        </title>
    <body>
        <h1>
            Create your topic here:
        </h1>
        <div>
            <form action="TopicCreate.php" method="get">
                <div><label for="name"> Subject: </label></div>
                <input id="name" name="name" type="text" maxlength=50>
                <br>
                <div><label for="description"> Description: </label></div>
                <textarea name="description" rows=4 cols=20 id="description" wrap="virtual" name="description" type="text" 
                          maxlength=150></textarea> 
                <!--<input id="description" name="description" type="text" rows=8 cols=40 wrap=virtual>-->
                <input id="creator" name="creator" type="hidden" value="admin">
                <input id="timestamp" name="timestamp" type="hidden"  value= "<?php echo date('Y-m-d H:i:s');?>">
                <br>
                <input type="submit">
                <input type="reset" class="button1" id="button1">
            </form>
        </div>
</html>
