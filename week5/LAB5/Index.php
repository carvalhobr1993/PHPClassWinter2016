<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        
    <p><a href="siteslookup.php">View Saved Sites</a></p>
        <title></title>
        <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
    </head>
    <body>
        <?php
        require './dbconnect.php';
        require './functions.php';
       // includes the form to sesarch URL's
        include_once './add.php';
        
        
        
        
        $db = dbconnect();
       
        // This calls the function that addds the website to the sitelinks Data base and will Curl the URL
        addweb ();
        
        
        ?>
        
       
        
    </body>
    
</html>
