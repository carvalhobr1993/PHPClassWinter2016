        <?php
        include_once './dbconnect.php';
        include_once './functions.php';
        
        
        
         $results = '';
        
        function addweb () {
            
           
           
            if (isPostRequest()) {
            $db = dbconnect();
            
            
            // Statment prepares a query to Insert the columns into the Actors table. 
            
           $stmt = $db->prepare("INSERT INTO sitelinks SET link = :link");
           
           
           $url = filter_input(INPUT_POST, 'link');
           
           // URL Validation
           
           include './errorpg.php';
           
           // this creates the HTML Curl for the provided URL
           include './curl.php';
          
           
           // binds the url to the sql link
           $binds = array(
                
               ":link" => $url
            );
            
           // Confirmation of Database Input
         if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
                $results = 'Data Added';
        }
            
        }
        }
        
        // Form to input URL below
        ?>
        
    
     <h1><?php echo $results; ?></h1>