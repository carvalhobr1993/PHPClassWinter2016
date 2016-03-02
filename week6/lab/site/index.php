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
            require_once '../includes/session-start.req-inc.php';
            require_once '../functions/cart-functions.php';
            require_once '../functions/dbconnect.php';
            require_once '../functions/utils-function.php';
            require_once '../functions/category-functions.php';
            require_once '../functions/products-functions.php';
                 
            // Cart Begins to Accumulate
            
            startCart();            
            
            // All Categories & Products Retrieved from Database
            
            $allCategories = getAllCategories();            
            $allProducts = getAllProducts();
            
            $categorySelected = filter_input(INPUT_GET, 'cat');
            $action = filter_input(INPUT_POST, 'action');
                       
            // Buy Button adds products to Cart
            
            if ( $action === 'buy' ) {
                $productID = filter_input(INPUT_POST, 'product_id');
                addToCart($productID);
                
            }
                  
           
            include_once '../includes/categories.html.php';
            include_once '../includes/products.html.php';
            
            
            
        ?>
        </br>
        <a href="checkout.php">Check Out</a>
        <a href="../index.php">Go Back</a>
    </body>
</html>
