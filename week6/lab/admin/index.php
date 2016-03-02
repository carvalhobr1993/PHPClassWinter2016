<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        
        <title></title>
        <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
    
        <title></title>
    </head>
    <body>
       <?php
        
            require_once '../includes/session-start.req-inc.php';
            
            include_once '../functions/dbconnect.php';
            include_once '../functions/login-function.php';
            include_once '../functions/utils-function.php';
        
            // Admin Account Requires that User Logs in w/ EMAIL & Password
            
            if ( isPostRequest() ) {
                
                $email = filter_input(INPUT_POST, 'email');
                $password = filter_input(INPUT_POST, 'pass');
                
                if ( isValidUser($email, $password) ) {
                    $_SESSION['isValidUser'] = true;                    
                } else {
                    $results = 'Sorry please try again';
                }
               
            }
            
            
            if ( isset($_SESSION['isValidUser']) &&  $_SESSION['isValidUser'] === true ) {
                include '../includes/admin-links.html.php';
            }
            
        ?>
        
        <?php include '../includes/results.html.php'; ?>
        
        <?php include '../includes/loginform.html.php'; ?>
    </body>
    <a href="../index.php">Home</a>
</html>
