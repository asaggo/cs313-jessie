<?php
session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="week03.css">
    </head>
    <body>
        <div class="list">
        <h1>Your order has been submitted.</h1>
        <p>Below is your list of order</p>
        <?php
            $products = $_SESSION["cart"];

            foreach ($products as $product) {
                echo "<p>$product</p>";
            }
        ?>
            
        <br><br>
        <p>Item(s) will be shipped to this address</p>
        <?php
            echo "<p>".$_POST["address"].", ".
                $_POST["state"]." zip-".$_POST["zip"]."</p>";
        ?>
        
        <p>Your cart will be empty</p>
        <form action="main.php" method="post">
            <input class="backToMain" type="submit" value="Back To Main">
        </form>
        <form action="logout.php" method="post">
            <input class="logout" type="submit" value="Logout">
        </form>
            
        </div>
        

        <?php
        $_SESSION["cart"] = array(); //renewing the cart
        ?>
    </body>
    
</html>
