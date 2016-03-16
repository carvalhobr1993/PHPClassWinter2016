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
        include_once '../Includes/session-start.req-inc.php';
        include_once '../Functions/dbconnect.php';
        include_once '../Functions/login-function.php';
        include_once '../Functions/utils-function.php';
        
        if ( isPostRequest() ) {
                
            // User Inputs the Email & Password 
            
                $email = filter_input(INPUT_POST, 'email');
                $pass = filter_input(INPUT_POST, 'password');
                
            // User Validation
                
                if ( isValidUser($email, $pass) ) {
                    $_SESSION['isValidUser'] = true;                    
                } else {
                    $results = 'Sorry please try again';
                }
               
            }
            
            // Adds to the Session Created by the Particular User
            
            if ( isset($_SESSION['isValidUser']) &&  $_SESSION['isValidUser'] === true ) {
                include '../Includes/add-view.html.php';
            }
            
        ?>
        
        <!-- Provides the Results of the Login Succession & the Login Form  -->
        
        <?php include '../Includes/results.html.php'; ?>
        
        <?php include '../Includes/loginform.html.php'; ?>
        
        </br>
        
        <!-- Link Brings You Home -->
        
        <a href="../index.php">Home</a>
        
    </body>
</html>
