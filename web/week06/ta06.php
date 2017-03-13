<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

$dbUser = 'ta_user';
$dbPassword = 'ta_pass';
$dbName = 'scripture_ta';
$dbPort = '5432';
$dbHost = 'localhost';
try
{
$db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);
$db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
}
catch(PDOException $ex)
{
echo "ERROR connecting to DB. Details: $ex";
die();
}
$statement = $db->prepare("INSERT INTO scripture(book,chapter,verse,content) VALUES (:book, :chapter, :verse, :content)");
$statement->bindValue(':book',htmlspecialchars($_POST['book']));
$statement->bindValue(':chapter',htmlspecialchars($_POST['chapter']));
$statement->bindValue(':verse',htmlspecialchars($_POST['verse']));
$statement->bindValue(':content',htmlspecialchars($_POST['content']));

$statement->execute();

var_dump($_POST);

$statement = $db->prepare("INSERT INTO scripture_topic(scripture_id, topic_id) VALUES (:scripture_id, :topic_id)"); 
$newId = $db->lastInsertId('scripture_id_seq');

foreach ($_POST['topic'] as $topic_id) {
	# code...
	$statement->bindValue(':scripture_id',htmlspecialchars($newId));
	$statement->bindValue(':topic_id',htmlspecialchars($topic_id));
	$statement->execute();
}



?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<h1>ENTER SCRIPTURE</h1>
<form method="post" action="ta06.php">
	<input type="text" placeholder="BOOK" name="book"><br>
	<input type="text" placeholder="CHAPTER" name="chapter"><br>
	<input type="text" placeholder="VERSE" name="verse"><br>
	<textarea placeholder="CONTENT" name="content"></textarea><br>
	<?php
		$statement = $db->prepare("SELECT id,name FROM topic");
		$statement->execute();

		while($row = $statement->fetch(PDO::FETCH_ASSOC)){
			echo $row['name']."<input type='checkbox' name='topic[]' value=".$row['id']."><br>";

		}

		
	?>
	<input type="submit" value="insert">
</form>
</body>
</html>