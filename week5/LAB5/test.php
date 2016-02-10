<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        // require './dbconnect.php';
        // require './functions.php';
        
        function add() {
        $url = filter_input(INPUT_POST, 'links');
        $sites = filter_input_array(INPUT_POST)['sitelinks'];
        
        if(isPostRequest() ) {
            $db = dbconnect();
            $stmt = $db->prepare("INSERT INTO sitelinks SET site_id = :site_id, link = :link");
                
                $binds = array( 
                ":link" => $url,
                        
            );
               if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
                    
                   $site_id = $db->lastInsertId();
                   var_dump($site_id);
                   
                   $stmt = $db->prepare("INSERT INTO sitelinks SET site_id = :site_id, link = :link");
                   
                   foreach ($sites as $site) {
                        $binds = array( ":link" => $site, ":site_id" => $site_id); 
                        $stmt->execute($binds);
                   }
                   
                   
        }
        }
        
        }
        
        ?>
    
    </body>
</html>