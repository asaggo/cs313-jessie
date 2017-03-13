<?php

$options = Array(
    'prefix'  => 'pgsql',
    'dbhost'  => 'localhost',
    'dbport'  => '5432',
    'dbname'  => 'cs313-php',
    'dbuser'  => '',
    'dbpass'  => ''
);

$host = $options['dbhost'];
$port = $options['dbport'];
$name = $options['dbname'];
$user = $options['dbuser'];
$pass = $options['dbpass'];

$db = new PDO(
    "pgsql:host={$host};port={$port};dbname={$name}",
    $user, $pass, Array(
        PDO::ATTR_ERRMODE          => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_EMULATE_PREPARES => FALSE
    )
);
