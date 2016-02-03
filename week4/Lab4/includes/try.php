<!DOCTYPE html>
        <?php 
        
        /*
        
        include_once $db['DOCUMENT_ROOT'] .
                '/includes/helpers.inc.php';
          
         
        include_once '../db_connect.php';
        include_once '../functions.php';
        
        // $db = dbconnect();
        $GET = isGetRequest();
        if (isGetRequest()) {
            $db = dbconnect();

            $own = '';
        $owns = '';
        $cor = '';
        $cors = '';
        $results = '';
        $row = '';
         * 
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

        
             
             
        }
        
        */
        
        ?>
         
         
            
    <html>
        <head>
            <meta charset="utf-8">
            <title>Search Form</title>
        </head>
        <body>
            <form action="#" method="get">
                <p>choose from the following criteria:</p>
                <br>
                <div>
                    <label for="owner">By owner:</label>
                    <select name="owner" id="owner">
                        <option value=""></option>
                        <option value="">Any owner</option>
                            <?php foreach ($own as $row): ?>
                            <option value="<?php echo ($row["id"]); ?>"><?php echo($row["owner"]); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div>
                    <label for="corp">By corporation:</label>
                    <select name="corp" id="corp">
                        <option value=""></option>
                        <option value="">Any corporation</option>
                        <?php foreach ($cors as $cor): ?>
                            <option value="<?php echo($cor['id']); ?>"><?php echo($cor['corp']); ?></option>
                            <?php endforeach; ?>
                    </select>
                </div>
                <div>
                    <label for="text">Containing text:</label>
                    <input type="text" name="text" id="text">
                </div>
                <div>
                    <input type="hidden" name="action" value="search">
                    <input type="submit" value="Search">
                </div>
            </form>
            
            
            <?php foreach ($results as $row): ?>
            <?php echo $row['id']; ?>
            <?php echo $row['owner']; ?>
            <?php echo $row['corp']; ?>
            
            <?php endforeach; ?>
            
        </body>
    </html>