<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$dbUser = 'asaggo';
$dbPassword = '9002dnjs';
$dbName = 'recipes';
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


?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php
$statement = $db->prepare('SELECT name,password FROM chef');
$statement->execute();
while($row = $statement->fetch(PDO::FETCH_ASSOC)){
	#echo serialize($row['title']);
	echo 'user: ' . $row['name'] . ' password: '. $row['password'] . '<br />';
}

$statement = $db->prepare('SELECT title FROM recipe');
$statement->execute();
while($row = $statement->fetch(PDO::FETCH_ASSOC)){
	echo 'Title: ' . $row['title']. '<br />';
}
?>
</body>
</html>