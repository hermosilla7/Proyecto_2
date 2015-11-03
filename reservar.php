<?php
include_once 'header.php';
include 'conexion.php';

$fecha = date('Y-m-d');

$sql_update="update recurso set estado = 1 where id_recurso = $_REQUEST[id_recurso]";
echo $sql_update;

$sql_insert="insert into reserva(id_user, id_recurso, dateini) values 
	                       ('2','$_REQUEST[id_recurso]', '$fecha')";
	                       echo $sql_insert;
	mysqli_query($con,$sql_insert)
	  or die("Problemas en el select".mysqli_error($con));

	mysqli_query($con,$sql_update)
	  or die("Problemas en el update".mysqli_error($con));

	mysqli_close($con);

	echo "Anunci donat d'alta";
?>

<?php include "footer.php";