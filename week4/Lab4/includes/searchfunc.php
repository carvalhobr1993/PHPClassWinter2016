<?php
        include '../db_connect.php';
       include '../functions.php';
       
       $db = dbconnect();
        
try
{
$results = $db->query('SELECT id, name FROM corps');
}
catch (PDOException $e)
{
$error = 'Error fetching authors from database!';
include 'error.html.php';

exit();
}
foreach ($results as $row)
{
$authors[] = array('id' => $row['id'], 'name' => $row['owner']);
}
try
{
$result = $db->query('SELECT id, corp FROM corps');
}
catch (PDOException $e)
{
$error = 'Error fetching categories from database!';
include 'error.html.php';
exit();
}
foreach ($result as $row)
{
$categories[] = array('id' => $row['id'], 'name' => $row['owner']);
}
include './searchform.php';
        ?>
