<?php

require_once('db.php');

session_start();

$query = 'SELECT id, password FROM ta_users WHERE username = :username LIMIT 1;';
$stmt = $db->prepare($query);
$stmt->bindValue(':username', $_POST['username'], PDO::PARAM_STR);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

if (!count($result)) {
    $_SESSION['error'] = 'Username not found.';
    header('Location: signin.php');
    exit();
}

$hash = $result[0]['password'];

if (password_verify($_POST['password'], $hash)) {
    $_SESSION['user'] = $result[0]['id'];
    header('Location: home.php');
    exit();
} else {
    $_SESSION['error'] = 'Password mismatch.';
    header('Location: signin.php');
    exit();
}
