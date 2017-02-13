<?php
session_start();
if (!isset($_SESSION["cart"])) {
	$_SESSION["cart"] = array();
}


$toys = $_POST["toys"];
foreach ($toys as $toy) {
	array_push($_SESSION["cart"], $toy);
}
header("Location: viewCart.php");
die("You should have been redirected.");
?>