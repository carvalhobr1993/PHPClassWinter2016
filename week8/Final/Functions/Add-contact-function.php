<?php

function createContact($addressgroupid, $fullname, $email, $birthday, $address, $phone, $website ) {
    $db = dbconnect();
    $stmt = $db->prepare("INSERT INTO address SET address_group_id = :address_group_id, fullname = :fullname, email = :email, birthday = :birthday, address = :address, phone = :phone, website = :website ");

    $binds = array(
        ":address_group_id" => $addressgroupid,
        ":fullname" => $fullname,
        ":email" => $email,
        ":birthday" => $birthday,
        ":address" => $address,
        ":phone" => $phone,
        ":website" => $website
    );

    if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
        return true;
    }
     
    return false;
    
    
}

function getAllContacts() {
    $db = dbconnect();
    $stmt = $db->prepare("SELECT * FROM address JOIN address_groups WHERE address_groups.address_group_id = address.address_group_id");
    $results = array();
    if ($stmt->execute() && $stmt->rowCount() > 0) {
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
     
    return $results;
    
}

function isValidName($value) {
    if ( empty($value) ) {
        return false;
    }
    return true;    
}
function isValidEmail($value) {
    if ( empty($value) ) {
        return false;
    }
    return true;
}
function isValidBirthday($value) {
    if ( empty($value) ) {
        return false;
    }
    return true;
}
function isValidAddress($value) {
    if ( empty($value) ) {
        return false;
    }
    return true;
}
function isValidPhone($value) {
    if ( empty($value) ) {
        return false;
    }
    return true;
}
function isValidWebsite($value) {
    if ( empty($value) ) {
        return false;
    }
    return true;
}

