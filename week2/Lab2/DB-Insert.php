<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        
        include_once './db-connect.php';
        
        $result = '';
        
        $firstname = filter_input(INPUT_POST, 'firstname');
        $lastname = filter_input(INPUT_POST, 'lastname');
        $dob = filter_input(INPUT_POST, 'dob');
        $height = filter_input(INPUT_POST, 'height');
        
        $db = dbconnect();
        
        $stmt = $db->prepare("INSERT INTO actors SET firstname = :firstname, lastname = :lastname, dob = :dob, height = :height");
        
        $binds = array(
                ":fistname" => $firstname,
                ":lastname" => $lastname,
                ":dob" => $dob,
                ":height" => $height
        );
        
        $results = 'Data was Not Added';
        if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
                $results = 'Data Added';
            }
        ?>
        
        <h1>
        <?php if ( !empty($results) ) {
            echo $result;
        }
        ?>
        </h1>
    </body>
</html>
