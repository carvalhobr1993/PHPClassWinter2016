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
        include '../../Includes/session-start.req-inc.php';
        include '../../Functions/dbconnect.php';
        include '../../Functions/utils-function.php';
        
        $db = dbconnect();
        
        $stmt = $db->prepare("SELECT * FROM address WHERE user_id = :user_id");
        
        $binds = array(
                ":user_id" => $_SESSION['id']
            );
         //   var_dump($binds);
         $results = array();
        if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        
        ?>
        
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Contacts</th>
                    <th></th>
                </tr>
            </thead>
        
        
       

            
            <?php foreach ($results as $row): ?>
            <tr>
                <td> <?php echo $row['fullname']; ?></td>
                <td> <a href="Read.php?id=<?php echo $row['address_id']; ?>">Read</a></td>
                <td><a href="Update.php?id=<?php echo $row['address_id']; ?>">Update</a></td>
                <td> <a href="Delete.php?id=<?php echo $row['address_id']; ?>">Delete</a></td>
        
       
                
            </tr>
            
            
        
            <?php endforeach; ?>
            
            <a href="../Add/Add-Contact.php?id=<?php echo $row['address_id']; ?>">Add Contact</a>
        
               
           
        </table>
    </body>
</html>
