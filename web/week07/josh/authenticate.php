<?php
session_start();
//require 'password.php';

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



$statement = $db->prepare("SELECT password FROM passwords WHERE user_name = :user_name");
$statement->bindValue(':user_name',$_POST['user_name'], PDO::PARAM_STR);
$statement->execute();
$result = $statement->fetchAll(PDO::FETCH_ASSOC);

var_dump($result);
$check = false;
$check = password_verify($_POST['password'],$result[0]['password']);

if ($check){  
    //relocate to home
    print 'true';
    header('Location: home.php');
}else{
    print 'false';
    header('Location: login.php');
}
?>
    