<?php
session_start();
require_once('db.php');

if(isset($_SESSION['userId'])){
    echo '<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">';
    echo '<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>';
    echo '<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>';
    echo "<a href='main.php' class='btn btn-default'>Go back to main page</a>";
    
    try{
        echo "<form method='post' action='editRecipeDetail.php'>";
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
                echo "<button name='title' value='".$row['title']."'>Edit ".$row['title']."</button>";
                echo "</div>";
            }

        }

        
        echo "</form>";
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    
    
    

    
}
?>
