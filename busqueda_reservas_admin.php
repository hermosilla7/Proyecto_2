<?php
include_once 'conexion.php';
include_once 'header_admin.php';
  
$consulta_recurso = ("SELECT * FROM recurso");
$consulta_categoria = ("SELECT * FROM categoria");
$result_recurso = mysqli_query($con, $consulta_recurso);
$result_categoria = mysqli_query($con, $consulta_categoria);

?>
	<p class="divEric">
		<form action="resultados_reservas_admin.php" method="GET">

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
			<select class="btn btn-default" id="categoria_tipo_select" name="categoria"  onchange="updateRecursosSelect(this.value)">
					<option value="0">Seleccionar categoría</option>
					<?php
					while($fila=mysqli_fetch_array($result_categoria)){
						echo utf8_encode("<option value=\"$fila[id]\">$fila[nombre]</option>");
					}
		        	?>
		    </select><br/><br>



		    <!-- Recurso -->
			<select class="btn btn-default" id="recurso" name="recurso" disabled="disabled">
		    </select><br/><br>

				<button id="botonEnviar" class="btn btn-success" type="submit">Enviar</button>
				<button id="botonReset" class="btn btn-danger" type="reset">Cancelar</button>
				<button id="botonAyuda" class="btn btn-info" type="button">?</button>
		</form>
	</p>
	<script type="text/javascript">
		$('#botonAyuda').popover({
			title: 'Ayuda',
			content: 'Rellena los campos necesarios',
			placement: 'right'
		});
	</script>

<?php  
	include "footer.php";
?>