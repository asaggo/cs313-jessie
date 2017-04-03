<?php
session_start();
require_once('db.php');
if(isset($_SESSION['userId'])){

    if(!empty($_POST)){
        try{
            $statement = $db->prepare('UPDATE recipe SET title = :titleNew, content = :content WHERE title = :titleOld;');
            $statement->bindValue(':titleNew',$_POST['title']);
            $statement->bindValue(':content',$_POST['content']);
            $statement->bindValue(':titleOld',$_SESSION['titleOld']);            
            $statement->execute();

            $statement->closeCursor();

            header("Location: editRecipe.php");
            exit();
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }
}
?>