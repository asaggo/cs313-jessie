<?php

require_once('db.php');

session_start();

if (!isset($_SESSION['user'])) {
    header('Location: signin.php');
    exit();
}

$query = 'SELECT username FROM ta_users WHERE id = :id LIMIT 1;';
$stmt = $db->prepare($query);
$stmt->bindValue(':id', $_SESSION['user'], PDO::PARAM_INT);
$stmt->execute();

$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
$username = $result[0]['username'];

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Home</title>
        <meta charset="utf-8" />
    </head>

    <body>
        <?php
            echo "<p>Welcome, {$username}</p>";
        ?>
        <p><a href="signout.php">Sign out</a></p>
    </body>
</html>
