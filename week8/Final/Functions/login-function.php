<?php
        
function isValidUser( $email, $pass ) {
    
    $db = dbconnect();
    $stmt = $db->prepare("SELECT * FROM users WHERE email = :email and password = :password");
    
    // Sha1 to Encrypt the Password Entered into the Database
    
    $pass = sha1($pass);
    $binds = array(
        ":email" => $email,
        ":password" => $pass        
    );

    if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
        $results = $stmt->fetch(PDO::FETCH_ASSOC);
        $_SESSION['id'] = $results['user_id'];
        return true;
    }
     
    return false;
    
}

