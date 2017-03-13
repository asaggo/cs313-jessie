<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
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
    	<input type="text" placeholder="Username" name="username"> <br />
    	<input type="password" placeholder="Password" name="password"><br />
    	<button>Sign In</button><br />
    </form>
    <form method="post" action="signup.php">
    	<input type="submit" name="submit" value="Sign Up">
    </form>


</body>
</html>