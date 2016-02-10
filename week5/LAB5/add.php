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
    <h1> Welcome to The Site Collection </h1>
    </br>
    <label> Search for Websites </label>
    <form action="#" method="post">
        Enter URL <input type="text" value="" name="link"  />
        <input type="submit" value="submit" />
        
        
    
    </form>
        
    </body>
</html>
