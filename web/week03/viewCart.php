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
        <h2 id="hsc">Your shopping cart</h2>

        <?php
            $products = $_SESSION["cart"];
            foreach ($products as $product) {
                echo "<p>$product</p>";
            }
        ?>

        <form action="main.php" method="post">
            <input class="backToMain" type="submit" value="Go Back">
        </form>
        <form action="logout.php" method="post">
            <input class="logout" type="submit" value="Logout">
        </form>
        <form action="checkout.php" method="post">
            <input class="checkout" type="submit" value="Check Out">
        </form>
    </div>
	</body>
    
    
</html>