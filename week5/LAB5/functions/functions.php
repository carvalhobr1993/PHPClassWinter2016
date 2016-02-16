<?php

// function to POST

function isPostRequest() {
    return ( filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'POST' );
}

// function to Get

function isGetRequest() {
    return ( filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'GET' );
}

function isURLValid($url) {
    if ( filter_var($url, FILTER_VALIDATE_URL) !== false  ){
        return true;
    }
        else {
            return false;
        }
        
    
    
}