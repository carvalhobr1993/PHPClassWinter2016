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
        include './includes/Sortform.php';
        //include './includes/searchform.php';
        include './includes/try.php';
        

       
        $db = dbconnect();

       
        $stmt = $db->prepare("SELECT * FROM corps");
        
       $results = array();
        if ($stmt->execute() && $stmt->rowCount() > 0) {
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
       
        ?>
        
        <table class="table table-condensed">
            <thead>
                <tr>
                    <th>Corporation</th>
                    <th></th>
                </tr>
            </thead>
            
            
<h1>Date time results</h1>
        <table class="table table-condensed">
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
    </body>
</html>