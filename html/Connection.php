<?php

$dsn = 'mysql:host=localhost;dbname=tutora';
$username = 'root';
$password = '';
try {
	$conn = new PDO($dsn, $username, $password);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
	$e->getMessage();
}