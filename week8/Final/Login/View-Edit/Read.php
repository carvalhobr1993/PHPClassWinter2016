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
        
        
        
        $id = filter_input(INPUT_GET, 'id');
        
        
        
        $stmt = $db->prepare("SELECT * FROM address WHERE address_id = :address_id and user_id = :user_id");
        
       
        
        $binds = array(
            ":address_id" => $id,
            ":user_id" => $_SESSION['id']
         );

      
        $results = array();
        if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        ?>

        <h1>Date time results</h1>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Address Group</th>
                    <th>Name</th>
                    <th>EMAIL</th>
                    <th>Address</th>
                    <th>Phone Number</th>
                    <th>Website</th>
                    <th>Birthday</th>
                </tr>
            </thead>
            
            <?php foreach ($results as $row): ?>
                <tr>
                    <td><?php echo $row['address_id']; ?></td>
                    <td><?php echo $row['address_group_id']; ?></td>
                    <td><?php echo $row['fullname']; ?></td> 
                    <td><a href="mailto:<?php echo $row['email']; ?>"><?php echo $row['email']; ?></a></td> 
                     <td><?php echo $row['address']; ?></td>  
                     <td><a href="tel:<?php echo $row['phone']; ?>"><?php echo $row['phone']; ?></a></td>
                     <td><?php echo $row['website']; ?></td>
                     <td><?php echo date("F d, Y",strtotime($row['birthday'])); ?></td>

                </tr>
            <?php endforeach; ?>
        </table>
        
        <p><a href="View.php">Go Back</a></p>
        
        
    </body>
</html>
