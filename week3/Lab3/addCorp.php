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
        
        /*
         * 
         * Include Statements will connect functions to page and database information to page
         */
        
        include './db_connect.php';
        include './functions.php';

        $results = '';

        if (isPostRequest()) {
            $db = dbconnect();

            
            // Statement that Inserts Data to the Table
            
            $stmt = $db->prepare("INSERT INTO corps SET id = :id, corp = :corp, incorp_dt = :incorp_dt, email = :email,
                zipcode = :zipcode, owner = :owner, phone = :phone, date = now()");
            
             // Creating values for the Input data
            
                $corp = filter_input(INPUT_POST, 'corp');
                $email = filter_input(INPUT_POST, 'email');
                $zipcode = filter_input(INPUT_POST, 'zipcode');
                $owner = filter_input(INPUT_POST, 'owner');
                $phone = filter_input(INPUT_POST, 'phone');
            
            
        
           // Array to Input data
            $binds = array(
                    
                    ":corp" => $corp,
                    ":email" => $email,
                    ":zipcode" => $zipcode,
                    ":owner" => $owner,
                    ":phone" => $phone,
            );

            // Successful message and confirmation that data had been submitted
            if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
                $results = 'Data Added';
            }
        }
        ?>


        <h1><?php echo $results; ?></h1>

        <h1>Add a new Corporation</h1>
        <form method="post" action="#">            
             Corporation <input type="text" value="" name="corp" />
            <br />
            E-mail <input type="text" value="" name="email" />
            <br />  
            Zip Code <input type="text" value="" name="zipcode" />
            <br />
            Owner <input type="text" value="" name="owner" />
            <br />
            Phone Number <input type="text" value="" name="phone" />
            <br />
          
           
            <input type="submit" value="Submit" />
        </form>
        
        <p><a href="view.php">Record Review</a></p>
    </body>
</html>
