<?php
session_start();
require_once('db.php');

if(isset($_SESSION['userId'])){
    
    /*
    $statement = $db->prepare('SELECT name FROM chef WHERE id = :id LIMIT 1');
    $statement->bindValue(':id',$_SESSION['userId']);
    */
    
    
    echo "<form method='post' action='insertRecipe.php'>";
    
    
    $statement = $db->prepare('SELECT id,type FROM country');
    
    $statement->execute();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    $statement->closeCursor();
    
    echo "<select name='country'>";
    foreach ($result as $row){
        echo "<option value='". $row['id']. "'>";
        echo $row['type']."</option>";
    }
    echo "</select>";
    
    
    $statement = $db->prepare('SELECT id,type FROM dish');
    
    $statement->execute();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    $statement->closeCursor();
    
    echo "<select name='dish'>";
    foreach ($result as $row){
        echo "<option value='". $row['id']. "'>";
        echo $row['type']."</option>";
    }
    echo "</select>";
    
    
    
    $statement = $db->prepare('SELECT id,type FROM level');
    
    $statement->execute();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    $statement->closeCursor();
    
    echo "<select name='level'>";
    foreach ($result as $row){
        echo "<option value='". $row['id']. "'>";
        echo $row['type']."</option>";
    }
    echo "</select>";
    
    
    $statement = $db->prepare('SELECT id,type FROM material');
    
    $statement->execute();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    $statement->closeCursor();
    
    echo "<select name='material'>";
    foreach ($result as $row){
        echo "<option value='". $row['id']. "'>";
        echo $row['type']."</option>";
    }
    echo "</select>";
    
    
    
    echo "<br>Title<br><input type='text' name='title'><br>";
    echo "Content<br><textarea name='content'></textarea>";
    echo "<br><button>Add Recipe!</button>";
    echo "</form>";
    
    
    if(!empty($_POST)){
        try{
        $statement = $db->prepare('INSERT INTO recipe(chef_id,dish_id,country_id,material_id,level_id,title,content) VALUES (:chef_id,:dish_id,:country_id,:material_id,:level_id,:title,:content);');
        $statement->bindValue(':chef_id',$_SESSION['userId']);
        $statement->bindValue(':dish_id',$_POST['dish']);
        $statement->bindValue(':country_id',$_POST['country']);
        $statement->bindValue(':material_id',$_POST['material']);
        $statement->bindValue(':level_id',$_POST['level']);
        $statement->bindValue(':title',$_POST['title']);
        $statement->bindValue(':content',$_POST['content']);
        
        $statement->execute();

        $statement->closeCursor();

        header("Location: main.php");
        exit();
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }
}
?>
