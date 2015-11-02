<?php 
	//Crear sesión
	session_start();

	//Vaciar sesión
	$_SESSION = array();

	//Destruir Sesión
	session_destroy();

	//Redireccionar a index.html
	header("location: index.html");
?>