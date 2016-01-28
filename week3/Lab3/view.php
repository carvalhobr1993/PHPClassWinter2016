<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        
       <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
        
        
         
    </head>
    <body>
        <?php
        
        include './db_connect.php';
        include './functions.php';
        
        

       
        $db = dbconnect();

       
        $stmt = $db->prepare("SELECT * FROM corps");

     
       
        
       $results = array();
        if ($stmt->execute() && $stmt->rowCount() > 0) {
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
       
        ?>
        
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Corporation</th>
                    <th></th>
                </tr>
            </thead>
        
        
        

            
            <?php foreach ($results as $row): ?>
            <tr>
                <td> <?php echo $row['corp']; ?></td>
                <td> <a href="read.php?id=<?php echo $row['id']; ?>">Read</a></td>
                <td><a href="Update.php?id=<?php echo $row['id']; ?>">Update</a></td>
                <td> <a href="Delete.php?id=<?php echo $row['id']; ?>">Delete</a></td>
        
       
                
            </tr>
            
            
        
            <?php endforeach; ?>
            
            <a href="addCorp.php?id=<?php echo $row['id']; ?>">Add New Corporation</a>
        
               
           
        </table>

    </body>
</html>