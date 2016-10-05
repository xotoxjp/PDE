/*
rutina de log out 
por Juan Pablo Soto (mas o menos)
falta integrarlo al proyect
*/

<?php
	session_start();
	unset ($SESSION['username']);
	session_destroy();
	header('Location: login.html'); 
?>
