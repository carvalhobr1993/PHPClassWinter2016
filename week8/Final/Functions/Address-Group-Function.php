<?php

function getAllGroups() {
    $db = dbconnect();
    $stmt = $db->prepare("SELECT * FROM address_groups");
    $results = array();
    if ($stmt->execute() && $stmt->rowCount() > 0) {
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
     
    return $results;
    
}

