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


?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php
$statement = $db->prepare('SELECT * FROM scripture');

$statement->execute();
while($row = $statement->fetch(PDO::FETCH_ASSOC)){
	echo serialize($row['book']);

}
?>
</body>
</html>