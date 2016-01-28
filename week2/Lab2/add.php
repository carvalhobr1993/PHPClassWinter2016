<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        
        // the include statements allow the page to access functions and connect to the database
        
        include_once './db-connect.php';
        include_once './functions.php';
        
        $results = '';
        if (isPostRequest()) {
            $db= dbconnect();
                
            // Statment prepares a query to Insert the columns into the Actors table. 
            
           $stmt = $db->prepare("INSERT INTO actors SET firstname = :firstname, lastname = :lastname, dob = :dob, height = :height");

            $firstname = filter_input(INPUT_POST, 'firstname');
            $lastname = filter_input(INPUT_POST, 'lastname');
            $dob = filter_input(INPUT_POST, 'dob');
            $height = filter_input(INPUT_POST, 'height');
            
            /* $binds becomes an array that binds the data from actors table to the view page Table
             * 
             * 
             * Data then becomes entered in at the bottom via echo
             * 
             */

            $binds = array(
                ":firstname" => $firstname,
                ":lastname" => $lastname,
                ":dob" => $dob,
                ":height" => $height
            );


            // statement states "Data Added after submission
            
            if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
                $results = 'Data Added';
            }
        }
        ?>

            
        
        
        <h1><?php echo $results; ?></h1>

        <form method="post" action="#">            
            Firstname <input type="text" value="" name="firstname" />
            <br />
            Lastname <input type="text" value="" name="lastname" />
            <br />
            Date of Birth <input type="date" value="" name="dob" />
            <br />
            Height <input type="text" value="" name="height" />
            <br />

            <input type="submit" value="Submit" />
        </form>
    </body>
</html>
