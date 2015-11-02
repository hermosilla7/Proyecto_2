<?php
include_once 'conexion.php';
// include_once 'cabecera.php';
  
$consulta_recurso = ("SELECT * FROM tbl_recurso");
$result_recurso = mysqli_query($con, $consulta_recurso);
?>
		<form action="resultados.php" method="GET">
			<input id="checkbox" type="checkbox" name="estado_recurso[]" value="0">Disponible<br/><br>
			<input id="checkbox" type="checkbox" name="estado_recurso[]" value="1">Ocupado<br/><br>
	   	
			<input id="boton" type="submit" value="Enviar">
			<input id="boton" type="reset" value="Cancelar">
			<input id="boton" type="button" onclick="alert('Rellena los campos para encontrar a tu mascota')" value="?">

		</form>
		<?php  include "footer.php";