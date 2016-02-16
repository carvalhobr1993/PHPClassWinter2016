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
        require '../functions/dbconnect.php';
        require '../functions/functions.php';
        $db = dbconnect();
          
         
        
         $stmt = $db->prepare("SELECT * FROM sitelinks JOIN sites ON sites.site_id = sitelinks.sites_id");
            $results = array();
            if ($stmt->execute() && $stmt->rowCount() > 0) {
                $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            
        ?>
        
        <h2>Results found <?php echo count($results); ?></h2>
            <table border="1">        
                <tbody>
                <?php foreach ($results as $index => $row): ?>
                    <tr>
                        <td><?php echo ($index+1); ?></td> 
                        <td><?php echo $row['link']; ?></td> 
                        <td><?php echo $row['site']; ?></td> 
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>

        
        <p><a href="Index.php">Add Sites</a></p>
    </body>
</html>
