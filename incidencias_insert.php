<?php
include_once 'header.php';
include 'conexion.php';

//creamos la sesion
session_start();
$user_id = $_SESSION['id_user'];

$fecha = date('Y-m-d');

$sql_insert="insert into incidencia(titulo, descripcion, id_recurso, id_usuario, fecha) values 
	                       ('$_REQUEST[titulo]','$_REQUEST[descripcion]', '$_REQUEST[recurso]',$user_id, '$fecha')";
	                       echo $sql_insert;
	mysqli_query($con,$sql_insert)
	  or die("Problemas en el select".mysqli_error($con));

	mysqli_close($con);

	echo "Incidencia dada de alta";
?>

<?php include "footer.php";