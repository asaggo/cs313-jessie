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
        <h2>Shipping Information</h2>

        <form action="submit.php" method="post">

            <label for="address">Address: </label><br />
            <input type="text" id="address" name="address" placeholder="190 Trejo st"/><br />

            <label for="state">State: </label><br />
            <input type="text" id="state" name="state" placeholder="ID"/><br />

            <label for="zip">Zip Code: </label><br />
            <input type="text" id="zip" name="zip" placeholder="83440"/><br />

            <input class="submitOrder" type="submit" value="Confirm Order">
        </form>

        <form action="viewCart.php" method="post">
            <input class="backToMain" type="submit" value="Return to Cart">
        </form>
        <form action="logout.php" method="post">
            <input class="logout" type="submit" value="Logout">
        </form>
    </div>
	</body>
</html>