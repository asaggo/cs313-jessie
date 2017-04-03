<?php
session_start();
require_once('db.php');

if(isset($_SESSION['userId'])){
    
    /*
    $statement = $db->prepare('SELECT name FROM chef WHERE id = :id LIMIT 1');
    $statement->bindValue(':id',$_SESSION['userId']);
    */
    
    echo '<meta name="viewport" content="width=device-width, initial-scale=1">';
    echo '<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">';
    echo '<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>';
    echo '<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>';
    echo "<a href='insertRecipe.php' class='btn btn-default'>Add Recipe Here</a><br>";
    
    
    echo "<form method='post' action='main.php'>";
    
    
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
    
    
    $statement = $db->prepare('SELECT id,name FROM chef');
    
    $statement->execute();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    $statement->closeCursor();
    
    echo "<select name='chef'>";
    foreach ($result as $row){
        echo "<option value='". $row['id']. "'>";
        echo $row['name']."</option>";
    }
    echo "</select>";
    
    
    echo "<button>Find!</button></form>";

    
    if (!empty($_POST)){
        $statement = $db->prepare('SELECT title,content FROM recipe WHERE chef_id = :chef_id AND dish_id = :dish_id AND country_id = :country_id AND material_id = :material_id AND level_id = :level_id');
        $statement->bindValue(':chef_id',$_POST['chef']);
        $statement->bindValue(':dish_id',$_POST['dish']);
        $statement->bindValue(':country_id',$_POST['country']);
        $statement->bindValue(':material_id',$_POST['material']);
        $statement->bindValue(':level_id',$_POST['level']);

        $statement->execute();

        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        $statement->closeCursor();

        if (empty($result)){
            echo "<h2>No Result</h2>";
        }
        else{
            echo "<div>";
            foreach ($result as $row){
                echo "<h2>". $row['title']. "</h2>";
                echo "<pre>". $row['content']."</pre>";
            }
            echo "</div>";
        }
    }
    
    
    echo "<br><br><a href='logout.php' class='btn btn-default'>Log Out</a>";
    echo "<br><br><a href='editRecipe.php' class='btn btn-default'>Edit My Recipe</a>";
    echo "<br><br><a href='deleteRecipe.php' class='btn btn-default'>Delete My Recipe</a>";
    
}
else{
    header('Location: login.html');
    exit();
}


?>