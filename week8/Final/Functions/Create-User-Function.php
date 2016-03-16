<?php

function createUser($email, $password) {
    $db = dbconnect();
    $stmt = $db->prepare("INSERT INTO users SET email = :email, password = :password ");
    
    // Sha1 to Encrypt the Password Entered into the Database
    
    $password = sha1($password);
    $binds = array(
        ":email" => $email,
        ":password" => $password
    );

    if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
        return true;
    }
     
    return false;
    
    
}

// Validates the Email & Password and stores as $value

function isValidEmail($value) {
    if ( empty($value) ) {
        return false;
    }
    return true;    
}
function isValidPassword($value) {
    if ( empty($value) ) {
        return false;
    }
    return true;
}