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
        
        /* 
         * The table is Styled with the Boot Strap
         * 
         * the include statement allow the page to connect to the database
         *
         *  
         * 
         */
            include './db-connect.php';
            
            $db = dbconnect();
            
        // query selects all from the actors table
            
            $stmt = $db->prepare("SELECT * FROM actors");
         
        // array defined
            
            $results = array();
        if ($stmt->execute() && $stmt->rowCount() > 0) {
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        ?>
        
       
        
        <table class="table table-condensed">
            <thead>
                <tr>
                    <th>id</th>
                    <th>firstname</th>
                    <th>lastname</th>
                    <th>dob</th>
                    <th>height</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($results as $row): ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['firstname']; ?></td>
                    <td><?php echo $row['lastname']; ?></td> 
                    <td><?php echo $row['dob']; ?></td>
                    <td><?php echo $row['height']; ?></td>  
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
            
            
    </body>
</html>
