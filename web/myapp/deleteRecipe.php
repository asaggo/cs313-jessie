<?php
session_start();
require_once('db.php');

if(isset($_SESSION['userId'])){
    echo '<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">';
    echo '<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>';
    echo '<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>';
    echo "<a href='main.php' class='btn btn-default'>Go back to main page</a>";
    
    try{
        echo "<form method='post' action='deleteRecipe.php'>";
        $statement = $db->prepare('SELECT title,content FROM recipe WHERE chef_id = :chef_id');
        $statement->bindValue(':chef_id',$_SESSION['userId']);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        $statement->closeCursor();

        //var_dump($result);
        if (empty($result)){
            echo "<h2>No Recipe Exists</h2>";
        }
        else{

            foreach ($result as $row){
                echo "<div>";
                echo "<h2>". $row['title']. "</h2>";
                echo "<pre>". $row['content']."</pre>";
                echo "<input type='submit' name='title' value='Delete ".$row['title']."'>";
                echo "</div>";
            }

        }


        
        echo "</form>";
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    
    
    
    if (!empty($_POST)){
        $statement = $db->prepare('DELETE FROM recipe WHERE recipe.title = :recipe_title');
        $statement->bindValue(':recipe_title',$row['title']);
        $statement->execute();

        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        $statement->closeCursor();
        
        header("Location:deleteRecipe.php");
        exit();
    }
    
}
?>
