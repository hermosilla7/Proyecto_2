<?php
include_once 'conexion.php';
include_once 'header.php';
  
$consulta_recurso = ("SELECT * FROM recurso");
$consulta_categoria = ("SELECT * FROM categoria");
$result_recurso = mysqli_query($con, $consulta_recurso);
$result_categoria = mysqli_query($con, $consulta_categoria);

?>
		<form action="resultados.php" method="GET">
			<input id="checkbox" type="checkbox" name="estado_recurso[]" value="0">Disponible<br/><br>
			<input id="checkbox" type="checkbox" name="estado_recurso[]" value="1">Ocupado<br/><br>

	   	<!-- Categoria -->
		<select id="categoria" name="categoria">
				<option value="">Seleccionar categoría</option>
				<?php
				while($fila=mysqli_fetch_array($result_categoria)){
					echo utf8_encode("<option value=\"$fila[id]\">$fila[nombre]</option>");
				}
	        	?>
	    </select><br/><br>

			<input id="boton" type="submit" value="Enviar">
			<input id="boton" type="reset" value="Cancelar">
			<input id="boton" type="button" onclick="alert('Rellena los campos necesarios')" value="?">



		</form>
		<?php  include "footer.php";