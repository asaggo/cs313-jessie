<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<h1>Recipe List</h1>
<?php 
$dbUser = 'asaggo';
$db = '9002dnjs';
$dbName = 'mydb';
$dbPort = '5432';

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

$statement = $db->prepare("SELECT recipe_id,content FROM recipe");
$statement->execute();

while($row = $statement->fetch(PDO::FETCH_ASSOC))
{
$id = $row['recipe_id'];
$content = $row['content'];

echo "<p><a href='prove05.php?recipe_id=$id'>$content</a></p>\n";

}

?>

</body>
</html>