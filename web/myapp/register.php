<?php

require_once('db.php');
$username = $_POST['username'];
$password = $_POST['password'];


$hash = password_hash($password, PASSWORD_DEFAULT);

try{
$statement = $db->prepare('INSERT INTO chef(name, password) VALUES(:name,:password)');
$statement->bindValue(':name',$username,PDO::PARAM_STR);
$statement->bindValue(':password',$hash,PDO::PARAM_STR);

$statement->execute();
$statement->closeCursor();
    
$id = $db->lastInsertId('chef_id_seq');
    
header("Location: login.html");
exit();
}
catch(PDOException $e){
    echo $e->getMessage();
}
    
    

?>