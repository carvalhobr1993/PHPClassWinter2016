<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        
        <title></title>
        <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
    
        <title></title>
    </head>
    <body>
        
        <?php
        
        // Uploads Images of Products into DataBase
        
        include '../../functions/products-functions.php';
        try{
            
            $uploadName = uploadImage('upfile');
            
            echo $uploadName;
            
        } catch (Exception $e) {

            echo $e->getMessage();
        }
        
        
        
        ?>
        
        <!-- The data encoding type, enctype, MUST be specified as below -->
        <form enctype="multipart/form-data" action="#" method="POST">
            <!-- MAX_FILE_SIZE must precede the file input field -->
            <!-- <input type="hidden" name="MAX_FILE_SIZE" value="30000" /> -->
            <!-- Name of input element determines name in $_FILES array -->
            Send this file: <input name="upfile" type="file" />
            <input type="submit" value="Send File" />
        </form>

        <?php if (isset($uploadName)): ?>
        <img src="./uploads/<?php echo $uploadName; ?>" /> 
        <?php endif; ?>
        <a href="../index.php">Go Back</a>
    </body>
</html>