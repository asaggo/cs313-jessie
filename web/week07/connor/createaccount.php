<?php

require_once('db.php');

session_start();

if ($_POST['password'] !== $_POST['verify_password']) {
    $_SESSION['error'] = 'Passwords must match.';
    header('Location: signup.php');
    exit();
}

if (strlen($_POST['password']) < 7 || preg_match('/[0-9]/', $_POST['password']) !== 1) {
    $_SESSION['error'] = 'Password must be 7+ characters long and contain a number.';
    header('Location: signup.php');
    exit();
}

$query = 'INSERT INTO ta_users(username, password) VALUES(:username, :password);';
$stmt = $db->prepare($query);
$stmt->bindValue(':username', $_POST['username'], PDO::PARAM_STR);
$stmt->bindValue(':password', password_hash($_POST['password'], PASSWORD_DEFAULT), PDO::PARAM_STR);
$stmt->execute();

header('Location: signin.php');
exit();
