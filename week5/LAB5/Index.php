<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        
    <p><a href="includes/siteslookup.php">View Saved Sites</a></p>
        <title></title>
        <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
    </head>
    <body>
        <?php
        include_once './functions/dbconnect.php';
        include_once './functions/functions.php';
       // includes the form to sesarch URL's
       // include_once './includes/add.php';
       include_once './functions/Add-Functions.php';
       
         
        
        
        if ( isPostRequest() ) {
            
            $url = filter_input(INPUT_POST, 'link');
            
            $errors = array();
            
            if ( !isURLValid($url) ) {
                 $errors[] = 'Not a Valid URL';
            }
            
            if ( count($errors) == 0 ) {
                
                if (isURLValid($url) ) {
                    $results = 'URL Valid';
                } else {
                    $results = 'URL Not Valid';
                }
                               
            } 
            
            // this creates the HTML Curl for the provided URL
            // include './includes/curl.php'; 
        }
        
        ?>
        
      
        
        <?php include './includes/error.html.php'; ?>
        
        <?php include_once './includes/results.html.php'; ?>
        
        <?php include_once './includes/URL-Form.html.php'; ?>
        
        
 
     
   
    </body>
    
</html>
