<?php
session_start();
require_once('db.php');

if(isset($_SESSION['userId'])){
    echo "Welcome";
    /*
    $statement = $db->prepare('SELECT name FROM chef WHERE id = :id LIMIT 1');
    $statement->bindValue(':id',$_SESSION['userId']);
    */
    $statement = $db->prepare('SELECT * FROM recipe');

    
    $statement->execute();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    $statement->closeCursor();
    
    echo '<pre>';
    var_dump($result[0]);
    echo '</pre>';
}
else{
    header('Location: login.html');
    exit();
}


?>