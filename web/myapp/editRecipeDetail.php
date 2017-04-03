<?php
session_start();
require_once('db.php');
if(isset($_SESSION['userId'])){
    try{
        if (!empty($_POST)){
            $statement = $db->prepare('SELECT title,content FROM recipe WHERE title = :title');
            $statement->bindValue(':title',$_POST['title']);
            $statement->execute();    
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            $statement->closeCursor();    

            //var_dump($result);
            $_SESSION['titleOld'] = $result[0]['title'];
            echo "<form method='post' action='editRecipeDB.php'>"; 
            echo "<br>Title<br><input type='text' name='title' value='".$result[0]['title']."'><br>";
            echo "Content<br><textarea name='content'>".$result[0]['content']."</textarea>";
            echo "<br><button>Edit Recipe!</button>";
            echo "</form>";

        //        header("Location:deleteRecipe.php");
        //        exit();
        }
    }catch(PDOException $e){
        echo $e->getMessage();
    }
}
?>