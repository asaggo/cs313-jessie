<?php
session_start();
if(!isset($_SESSION["username"])){
    header("Location:week03.html");
    exit();
}
$username = $_SESSION["username"];
?>

<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="week03.css">
        <script src="week03.js" type="text/javascript"></script>
        <title>Welcome</title>
    </head>
    <body>
        <div class="wholePage">
            <div class="buttons">
                <form action="viewCart.php" method="post">
                    <input class="viewCart" type="submit" value="View Cart">
                </form>
                <form action="logout.php" method="post">
                    <input class="logout" type="submit" value="Logout">
                </form>

            </div>
            <div class="list">
                <h1>Welcome <?php echo $username ?></h1>
                <br><br>
                
                <h3>Cat Accessary</h3>
                <form action="addToCart.php" method="post">
                    <table align="center">
                    <tr>
                        <th>Cat Toy1</th>
                        <th>Cat Toy2</th>
                        <th>Cat Toy3</th>
                    </tr>
                    <tr>
                        <th><img src="catToy1.png" /></th>
                        <th><img src="catToy2.png" /></th>
                        <th><img src="catToy3.png" /></th>
                    </tr>
                    <tr>
                        <td class="price">$199.89</td>
                        <td class="price">$49.79</td>
                        <td class="price">$19.59</td>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" name="toys[]" value="Cat Toy1">
                        </td>
                        <td>
                            <input type="checkbox" name="toys[]" value="Cat Toy2">
                        </td>
                        <td>
                            <input type="checkbox" name="toys[]" value="Cat Toy3">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="submit" value="Add To Cart">
                        </td>    
                    </tr>
                    </table>
                </form>
                
            </div>
            
        </div>
    </body>
</html>