<?php
include_once 'conexion.php';
include_once 'header.php';
  
$consulta_recurso = ("SELECT * FROM recurso");
$consulta_categoria = ("SELECT * FROM categoria");
$result_recurso = mysqli_query($con, $consulta_recurso);
$result_categoria = mysqli_query($con, $consulta_categoria);

?>
	<p class="divEric">
		<form action="resultados_reservas.php" method="GET">

<script type="text/javascript">
			<?php
			$recursos = [];
				while($fila=mysqli_fetch_array($result_recurso)) {
					$recursos[] = [
						'value' => utf8_encode($fila['id_recurso']),
						'categoria' => utf8_encode($fila['categoria']),
						'display' => utf8_encode($fila['nombre']),
					];
				}
				echo 'var recursos = '. json_encode($recursos) . ';';
	        ?>

	function updateRecursosSelect(value)
	{
		var options = '<option value="0">Seleccionar</option>';
		for (var i = 0; i < recursos.length; i++) {
			if (recursos[i].categoria == value) {
				options += '<option value="'+recursos[i].value+'">'+recursos[i].display+'</option>';
			}
		}
		var recursos_select = document.getElementById('recurso');
		recursos_select.innerHTML = options;
		recursos_select.disabled = value == 0;
	}

	// Mozilla, Opera, Webkit 
	if ( document.addEventListener ) {
	 	 document.addEventListener( "DOMContentLoaded", function(){
	    document.removeEventListener( "DOMContentLoaded", arguments.callee, false);
	    updateRecursosSelect(document.getElementById('categoria_tipo_select').value);
	  }, false );

	// If IE event model is used
	} else if ( document.attachEvent ) {
	  // ensure firing before onload
	  document.attachEvent("onreadystatechange", function(){
	    if ( document.readyState === "complete" ) {
	      document.detachEvent( "onreadystatechange", arguments.callee );
			updateRecursosSelect(document.getElementById('categoria_tipo_select').value);    }
	  });
	}	

</script>


		<!-- Categoria -->
		<select id="categoria_tipo_select" name="categoria"  onchange="updateRecursosSelect(this.value)">
				<option value="0">Seleccionar categoría</option>
				<?php
				while($fila=mysqli_fetch_array($result_categoria)){
					echo utf8_encode("<option value=\"$fila[id]\">$fila[nombre]</option>");
				}
	        	?>
	    </select><br/><br>



	    <!-- Recurso -->
		<select id="recurso" name="recurso" disabled="disabled">
	    </select><br/><br>

			<input id="boton" type="submit" value="Enviar">
			<input id="boton" type="reset" value="Cancelar">
			<input id="boton" type="button" onclick="alert('Rellena los campos necesarios')" value="?">

	</p>

		</form>
		<?php  include "footer.php";