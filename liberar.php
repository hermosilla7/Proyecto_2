<?php
	include 'conexion.php';

	//creamos la sesion
	session_start();
	$user_id = $_SESSION['id_user'];

	$fecha = date("Y-m-d H:i:s");

	$sql_update="update recurso set estado = 0 where id_recurso = $_REQUEST[id_recurso]";


	$sql_insert="insert into reserva(id_user, id_recurso, dateini) values 
		                       ('$user_id','$_REQUEST[id_recurso]', '$fecha')";


		mysqli_query($con,$sql_insert)
		  or die("Problemas en el select".mysqli_error($con));

		mysqli_query($con,$sql_update)
		  or die("Problemas en el update".mysqli_error($con));

		mysqli_close($con);


	header("Location: user.php");
?>
 