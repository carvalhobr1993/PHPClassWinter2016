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
         * 
         * Include Statements will connect functions to page and database information to page
         */
        
        include './db_connect.php';
        include './functions.php';

       
        $db = dbconnect();

       // Performs Function GET to retrieve id from the URL and display 1 result vs 100 results
        
        $id = filter_input(INPUT_GET, 'id');
        
        // Query to recieve 1 id from the URL and display it.
        
        $stmt = $db->prepare("SELECT * FROM corps WHERE id = :id");
        
        // binds the id to submit 1 id vs 100
        
        $binds = array(
            ":id" => $id
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
                    <th>Corporation</th>
                    <th>E-mail</th>
                    <th>Owner</th>
                    <th>Zip Code</th>
                    <th>Phone Number</th>
                    <th>Date</th>
                </tr>
            </thead>
            
            <?php foreach ($results as $row): ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['corp']; ?></td>
                    <td><?php echo $row['email']; ?></td> 
                    <td><?php echo $row['owner']; ?></td> 
                     <td><?php echo $row['zipcode']; ?></td>  
                     <td><?php echo $row['phone']; ?></td>
                     <td><?php echo date("F d, Y",strtotime($row['incorp_dt'])); ?></td>

                </tr>
            <?php endforeach; ?>
        </table>
        
        <p><a href="view.php">Go Back</a></p>

    </body>
</html>
