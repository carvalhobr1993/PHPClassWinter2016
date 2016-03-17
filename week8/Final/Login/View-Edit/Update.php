<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>
            <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

        </title>
    </head>
    <body>
        <?php
        
        include '../../Includes/session-start.req-inc.php';
        include '../../Functions/dbconnect.php';
        include '../../Functions/utils-function.php';
        
        $db = dbconnect();
        
        
        $result = '';
            if (isPostRequest()) {
               
                $addressgroupid = filter_input(INPUT_POST, 'address_group_id');
                $fullname = filter_input(INPUT_POST, 'fullname');
                $email = filter_input(INPUT_POST, 'email');
                $birthday = filter_input(INPUT_POST, 'birthday');
                $address = filter_input(INPUT_POST, 'address');
                $phone = filter_input(INPUT_POST, 'phone');
                $website = filter_input(INPUT_POST, 'website');
                $stmt = $db->prepare("UPDATE address set user_id = :user_id, address_group_id = :address_group_id, fullname = :fullname, email = :email, birthday = :birthday, address = :address, phone = :phone, website = :website ");
                
                $binds = array(
                ":address_group_id" => $addressgroupid,
                ":fullname" => $fullname,
                ":email" => $email,
                ":birthday" => $birthday,
                ":address" => $address,
                ":phone" => $phone,
                ":website" => $website,
                ":user_id" => $_SESSION['id']
    );

    if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
        return true;
    }
     
    return false;
                
                if ($stmt->execute($_SESSION['id']) && $stmt->rowCount() > 0) {
                   $result = 'Record updated';
                }
            } else {
                
                $stmt = $db->prepare("SELECT * FROM address where user_id = :user_id");
                $binds = array(
                    ":user_id" => $_SESSION['id']
                );
                if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
                   $results = $stmt->fetch(PDO::FETCH_ASSOC);
                }
                if ( !isset($_SESSION['id']) ) {
                    die('Record not found');
                }
                
                
                
                $addressgroup = $results['address_group_id'];
                $name = $results['fullname'];
                $email = $results['email'];
                $birthday = $results['birthday'];
                $address = $results['address'];
                $phone = $results['phone'];
                $website = $results['website'];
                $_SESSION['id'] = $results['id'];
                
                
                 
               
           
            }
        
        ?>
        
        <h1><?php echo $result; ?></h1>
        
        <form method="post" action="#">            
            Address Group <input type="text" value="<?php echo $addressgroup; ?>" name="address_group_id" />
            <br />
            Name <input type="text" value="<?php echo $name; ?>" name="fullname" />
            <br />  
            E-Mail <input type="text" value="<?php echo $email; ?>" name="email" />
            <br />
            Birthday <input type="text" value="<?php echo $birthday; ?>" name="birthday" />
            <br />
            Address <input type="text" value="<?php echo $address; ?>" name="address" />
            <br />
            Phone Number <input type="text" value="<?php echo $phone; ?>" name="phone" />
            <br />
            Website <input type="text" value="<?php echo $website; ?>" name="website" />
            <br />
            <input type="hidden" value="<?php echo $id; ?>" name="address_id" /> 
            <input type="submit" value="Update" />
        </form>
        
        <p> <a href="View.php">View page</a></p>
        
    </body>
</html>
