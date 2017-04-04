<?php
session_start();
require_once('db.php');

if(isset($_SESSION['userId'])){
    
    /*
    $statement = $db->prepare('SELECT name FROM chef WHERE id = :id LIMIT 1');
    $statement->bindValue(':id',$_SESSION['userId']);
    */
    echo '<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">';
    echo '<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>';
    echo '<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>';
    echo '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/css/bootstrap-select.min.css">';
    echo '<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/bootstrap-select.min.js"></script>';
    echo '<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/i18n/defaults-*.min.js"></script>';
    
    echo "<div class='container'>";
    echo "<form method='post' action='insertRecipe.php'>";
    
    
    $statement = $db->prepare('SELECT id,type FROM country');
    
    $statement->execute();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    $statement->closeCursor();
    
    echo "<select name='country' class='selectpicker' data-style='btn-primary'>";
    foreach ($result as $row){
        echo "<option value='". $row['id']. "'>";
        echo $row['type']."</option>";
    }
    echo "</select>";
    
    
    $statement = $db->prepare('SELECT id,type FROM dish');
    
    $statement->execute();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    $statement->closeCursor();
    
    echo "<select name='dish' class='selectpicker' data-style='btn btn-info'>";
    foreach ($result as $row){
        echo "<option value='". $row['id']. "'>";
        echo $row['type']."</option>";
    }
    echo "</select>";
    
    
    
    $statement = $db->prepare('SELECT id,type FROM level');
    
    $statement->execute();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    $statement->closeCursor();
    
    echo "<select name='level' class='selectpicker' data-style='btn-success'>";
    foreach ($result as $row){
        echo "<option value='". $row['id']. "'>";
        echo $row['type']."</option>";
    }
    echo "</select>";
    
    
    $statement = $db->prepare('SELECT id,type FROM material');
    
    $statement->execute();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    $statement->closeCursor();
    
    echo "<select name='material' class='selectpicker' data-style='btn-warning'>";
    foreach ($result as $row){
        echo "<option value='". $row['id']. "'>";
        echo $row['type']."</option>";
    }
    echo "</select>";
    
    
    echo "<br>Title<br><input type='text' name='title'><br>";
    echo "<div class='form-group'>";
    echo "Content<br><textarea name='content' class='form-control' rows='10' id='comment'></textarea></div>";
    echo "<br><button>Add Recipe!</button>";
    echo "</form></div>";
    
    
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
