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
        <h1>Your Shopping Cart</h1>
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
                
            $total = 0;
        
            $checkoutProducts = array();
            
            $items = getCart();
            
            print_r($items);
            
            foreach ($items as $id) {
                $checkoutProducts[] = getProduct($id);      
            }
            $cart = array();
            
            include '../includes/checkout.html.php';
        ?>
        
    <?php if (count($items) > 0): ?>
    
    <?php else: ?>
    <p>Your cart is empty!</p>
    <?php endif; ?>
        <form action="?" method="post">
      <p>
          <?php
          
          // Empty the Cart using Button below
          
          unset($_SESSION['cart']); 
          
          ?>
          <a href="index.php">Continue shopping</a> or
        <input type="submit" name="action" value="Empty cart">
      </p>
    </form>
    </body>
</html>
