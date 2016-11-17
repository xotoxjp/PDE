<?php

$server = 'localhost';
$username = 'root';
$password = 'lamisma';
$database = 'crud1';
$tbl_name = 'usuarios';

try{
	$conn = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
	
} catch(PDOException $e){
	die( "La conexion falló: " . $e->getMessage());
}

?>