<?php
session_start();

//connect to the database
error_reporting(E_ALL);
ini_set('display_errors', 1);

$dbUser = 'tester';
$dbPassword = 'tester_password';
$dbName = 'postgres';
$dbPort = '5432';
$dbHost = 'localhost';
try
{
    $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);
    $db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
}
catch(PDOException $ex)
{
    echo "ERROR connecting to DB. Details: $ex";
    die();
}


//store session vars
$_SESSION['user'] = $_POST['user_name'];
$_SESSION['password'] = $_POST['password'];
$_SESSION['email'] = $_POST['email'];

$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

$statement = $db->prepare("INSERT INTO passwords(user_name, password, email) VALUES (:user_name, :password, :email)");
$statement->bindValue(':user_name',$_POST['user_name'], PDO::PARAM_STR);
$statement->bindValue(':password',$password, PDO::PARAM_STR);
$statement->bindValue(':email',$_POST['email'], PDO::PARAM_STR);
$statement->execute();


header('Location: login.php');



?>
    

