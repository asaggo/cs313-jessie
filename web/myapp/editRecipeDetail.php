<?php
session_start();
require_once('db.php');
echo '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/css/bootstrap-select.min.css">';
echo '<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/bootstrap-select.min.js"></script>';
echo '<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/i18n/defaults-*.min.js"></script>';

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
            echo "<div class='form-group'>";
            echo "Content<br><textarea name='content' class='form-control' rows='10' id='comment'>".$result[0]['content']."</textarea></div>";
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