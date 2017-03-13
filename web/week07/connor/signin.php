<?php

session_start();

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Sign In</title>
        <meta charset="utf-8" />
    </head>

    <body>
        <?php
            if (isset($_SESSION['error'])) {
                echo "<p>{$_SESSION['error']}</p>";
                unset($_SESSION['error']);
            }
        ?>
        <form method="post" action="authenticate.php">
            <input type="text" name="username" required placeholder="Username" /><br />
            <input type="password" name="password" required placeholder="Password" /><br />
            <button>Sign In</button>
        </form>
        <p><a href="signup.php">Register</a></p>tpp
    </body>
</html>
