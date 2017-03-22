<?php

$host = 'localhost';
$port = 5432;
$name = 'recipes';
$user = 'asaggo';
$pass = '9002dnjs';
 

try{
    
    $db = new PDO(
        "pgsql:host={$host};port={$port};dbname={$name}",
        $user,
        $pass,
        Array(
            PDO::ATTR_ERRMODE          => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_EMULATE_PREPARES => FALSE
        )
    );
}
catch(PDOException $e){
    echo $e->getMessage();
}

/*
try{
    
    $statement = $db->prepare('SELECT * FROM recipe');
    $statement->execute();


    while($result = $statement->fetch(PDO::FETCH_ASSOC)){
        var_dump($result);
    }
    $statement->closeCursor();
}
catch(PDOException $e){
    echo 'execute' + $e->getMessage();
}
*/
?>