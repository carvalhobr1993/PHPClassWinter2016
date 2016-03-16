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
        
        include '../../Includes/session-start.req-inc.php';
        include_once '../../Functions/dbconnect.php';
        include_once '../../Functions/utils-function.php';
        include_once '../../Functions/Add-contact-function.php';
        include_once '../../Functions/Address-Group-Function.php';
        
        include_once '../../Includes/session-start.req-inc.php';
        
        // Retrieves all Groups
        
        $groups = getAllGroups();
        
        
        
        if ( isPostRequest() ) {
            
            // Input from User to add Contact Information
            
            $addressgroupid = filter_input(INPUT_POST, 'address_group_id');
            $fullname = filter_input(INPUT_POST, 'fullname');
            $email = filter_input(INPUT_POST, 'email');
            $birthday = filter_input(INPUT_POST, 'birthday');
            $address = filter_input(INPUT_POST, 'address');
            $phone = filter_input(INPUT_POST, 'phone');
            $website = filter_input(INPUT_POST, 'website');
            
        
        $errors = array();
            
        // Error Validation for each Input
        
            if ( !isValidName($fullname) ) {
                $errors[] = 'Name is not Valid';
            }
            
            if ( !isValidEmail($email) ) {
                $errors[] = 'Email is not Valid';
            }
            
            if ( !isValidBirthday($birthday) ) {
                $errors[] = 'birthday is not Valid';
            }
            
            if ( !isValidAddress($address) ) {
                $errors[] = 'address is not Valid';
            }
            
            if ( !isValidPhone($phone) ) {
                $errors[] = 'Phone Number is not Valid';
            }
            
            if ( !isValidWebsite($website) ) {
                $errors[] = 'website is not Valid';
            }
        
            // As long as no errors are trigger it will allow the the Funtion to Add the Information to the Database
            
            if ( count($errors) == 0 ) {
                
                if ( createContact($addressgroupid, $fullname, $email, $birthday, $address, $phone, $website ) ) {
                    $results = 'Contact Added';
                } else {
                    $results = 'Contact was not Added';
                }
            }
        }
            
            
        ?>
        
        <!-- Provides the Results of Contact Creation & the Login Form 
        
             The Add Contact form is also included Below
        -->
        
        <?php        include '../../Includes/errors.html.php'; ?>
        
        <?php        include '../../Includes/results.html.php'; ?>
        
        <?php        include '../../Includes/addcontactform.html.php'; ?>
        
    </body>
    
    <!-- Link Brings You Home -->
    
    <a href="../../Index.php">Go Home</a>
        
        
</html>
