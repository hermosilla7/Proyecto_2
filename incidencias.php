<?php
include_once 'conexion.php';
include_once 'header.php';
  
$consulta_incidencias = ("SELECT * FROM incidencia");
$result_incidencias = mysqli_query($con, $consulta_incidencias);

$consulta_recursos = ("SELECT * FROM recurso");
$result_recursos = mysqli_query($con, $consulta_recursos);

?>
	<form action="incidencias_insert.php" method="GET">
	Título:
	<input type="text" name="titulo" id="titulo"><br>
	Descripción:
	<input type="text" name="descripcion" id="descripcion"><br>

   	<!-- Recurso -->
	<select id="recurso" name="recurso">
			<option value="">Seleccionar recurso</option>
			<?php
			while($fila=mysqli_fetch_array($result_recursos)){
				echo utf8_encode("<option value=\"$fila[id_recurso]\">$fila[nombre]</option>");
			}
        	?>
    </select><br/><br>

		<input id="boton" type="submit" value="Enviar">
		<input id="boton" type="reset" value="Cancelar">
		<input id="boton" type="button" onclick="alert('Rellena los campos necesarios')" value="?">
	</form>
<?php  include "footer.php";