<?php
	include 'conexion.php';

	//creamos la sesion
	session_start();
	$user_id = $_SESSION['id_user'];

	$fecha = date("Y-m-d H:i:s");

	$sql_insert="insert into incidencia(titulo, descripcion, id_recurso, id_usuario, fecha) values 
		                       ('$_REQUEST[titulo]','$_REQUEST[descripcion]', '$_REQUEST[recurso]',$user_id, '$fecha')";


		mysqli_query($con,$sql_insert)
		  or die("Problemas en el select".mysqli_error($con));

		mysqli_close($con);

	header("Location: incidencias.php");
?>
