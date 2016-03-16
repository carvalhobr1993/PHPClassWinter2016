<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>
            <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

        </title>
    </head>
    <body>
        <?php
        include '../../Functions/dbconnect.php';
        include '../../Functions/utils-function.php';
        
        $db = dbconnect();
        
        $id = filter_input(INPUT_GET, 'address_id'); 
            
            $stmt = $db->prepare("DELETE FROM address where address_id = :address_id");
            
            $binds = array(
                ":address_id" => $id
            );

       // Statment executed to delet records
            
        $isDeleted = false;
        if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
            $isDeleted = true;
        }       
        
        ?>
        
        
        <h1> Record <?php echo $id; ?>
         <?php if ( !$isDeleted ): ?> 
          Not
        <?php endif; ?>
        Deleted</h1>
        
        
        <p> <a href="view.php">View page</a></p>
        
    </body>
</html>
