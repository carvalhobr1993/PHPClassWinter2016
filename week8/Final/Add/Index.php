<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

    <h1>
        Create Account & Password
    </h1>
    
    </head>
    <body>
        <?php
        include_once '../Includes/session-start.req-inc.php';
        include_once '../Functions/dbconnect.php';
        include_once '../Functions/utils-function.php';
        include_once '../Functions/login-function.php';
        
        include_once '../Functions/Create-User-Function.php';
        
        if ( isPostRequest() ) {
            
        // User Creates an account by entering in their EMAIL and Creating a Password 
            
            $email = filter_input(INPUT_POST, 'email');
            $password = filter_input(INPUT_POST, 'password');
            
        
        // Error Validating the Email and Password Entered
            
        $errors = array();
            
            if ( !isValidEmail($email) ) {
                $errors[] = 'Email is not Valid';
            }
            
            if ( !isValidPassword($password) ) {
                $errors[] = 'Password is not Valid';
            }
        
            /* As long as their is no Errors the Email and Password 
             * for that user are added to the database and Granted access
             */
            
            if ( count($errors) == 0 ) {
                
                if ( createuser($email, $password ) ) {
                    $results = 'User Added';
                } else {
                    $results = 'User was not Added';
                }
            }
        }
            
            
        ?>
        
        <!-- Provides the Results of the Account Creation & the Login Form  -->
        
        <?php        include '../Includes/errors.html.php'; ?>
        
        <?php        include '../Includes/results.html.php'; ?>
        
        <?php        include '../Includes/loginform.html.php' ?>
        
    </body>
    
    <!-- Link Brings You Home -->
    
    <a href="../Index.php">Go Home</a>
</html>
