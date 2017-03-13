<?php

session_start();

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Sign Up</title>
        <meta charset="utf-8" />
    </head>

    <body>
        <?php
            if (isset($_SESSION['error'])) {
                echo "<p style=\"color:red;\">{$_SESSION['error']}</p>";
            }
        ?>
        <form method="post" action="createaccount.php">
            <label>Username: <input type="text" name="username" required placeholder="Username" /></label><br />
            <label>Password: <input type="password" name="password" required placeholder="Password" pattern="(?=.*[0-9])(?=.*[a-zA-Z])([a-zA-Z0-9]+){7,}" /><?php
                if (isset($_SESSION['error'])) {
                    echo "<span style=\"color:red;\">*</span>";
                }
            ?></label><br />
            <label>Verify password: <input type="password" name="verify_password" required placeholder="Verify password" pattern="(?=.*[0-9])(?=.*[a-zA-Z])([a-zA-Z0-9]+){7,}" /><?php
                if (isset($_SESSION['error'])) {
                    echo "<span style=\"color:red;\">*</span>";
                    unset($_SESSION['error']);
                }
            ?></label><br />
            <button>Create</button>
        </form>
    </body>
</html>
