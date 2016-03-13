<?php

function addweb($url) {
    $db = dbconnect();
    $stmt = $db->prepare("INSERT INTO sitelinks SET link = :link");

    $binds = array(
        ":link" => $url
    );

    if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
        return true;
    }
     
    return false;
}

function getallweb() {
    $db = dbconnect();
    $stmt = $db->prepare("SELECT * FROM sitelinks");
    $results = array();
    if ($stmt->execute() && $stmt->rowCount() > 0) {
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
     
    return $results;
    
}

