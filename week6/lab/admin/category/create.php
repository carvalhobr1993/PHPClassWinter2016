<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        
        <title></title>
        <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
    
        <title></title>
    </head>
    <body>
        <?php
        require_once '../../includes/session-start.req-inc.php';
        require_once '../../includes/access-required.html.php';
         
         
        include_once '../../functions/dbconnect.php';
        include_once '../../functions/category-functions.php';
        include_once '../../functions/utils-function.php';
        
       
        
         if ( isPostRequest() ) {
            
            $category = filter_input(INPUT_POST, 'category');
            $errors = array();
            
            if ( ! isValidCategory($category) ) {
                 $errors[] = 'Category is not valid';
            }
            
            if ( count($errors) == 0 ) {
                
                if ( createCategory($category) ) {
                    $results = 'Category added';
                } else {
                    $results = 'Category was not added';
                }
                               
            } 
            
            
        }
        
        
        ?>
        
         <h1>Add Category</h1>
        
          <?php include '../../includes/errors.html.php'; ?>
        
         
       <?php include '../../includes/results.html.php'; ?>
               
        <form method="post" action="#">
            Category Name : <input type="text" name="category" value="" />
            <input type="submit" value="Submit" />
        </form>
         <a href="../index.php">Go Back</a>
    </body>
</html>
