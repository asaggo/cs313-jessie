<?php
session_start();
require_once('db.php');
$username = $_POST['username'];
$password = $_POST['password'];


//$hash = password_hash($password, PASSWORD_DEFAULT);

try{
    $statement = $db->prepare('SELECT id, password FROM chef WHERE name=:name LIMIT 1');
    $statement->bindValue(':name',$username,PDO::PARAM_STR);
    $statement->execute();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    $statement->closeCursor();
    
    //if there is no match for the username
    if (empty($result)){
        $Message = "Invalid username"
        header('Location: redirect.php?Message=' . urlencode($Message));
        exit();    
    }else if(!password_verify($password,$result[0]['password'])) {
        echo '<script language="javascript">';
        echo 'alert("Incorrect password")';
        echo '</script>';
        header('Location: login.html');
        exit();
    }else {
        echo "Valid!";
        session_regenerate_id();
        $_SESSION['userId'] = $result[0]['id'];
        header('Location: main.php');
        exit();
    }
    
    
    //$id = $db->lastInsertId('chef_id_seq');
}
catch(PDOException $e){
    echo $e->getMessage();
}
    
    
    
?>