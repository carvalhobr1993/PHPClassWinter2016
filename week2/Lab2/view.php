<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        
            include './db-connect.php';
            
            $db = dbconnect();
            
            $stmt = $db->prepare("SELECT * FROM actors");
            
            $results = array();
        if ($stmt->execute() && $stmt->rowCount() > 0) {
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        ?>
        
        
        
        <table>
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
