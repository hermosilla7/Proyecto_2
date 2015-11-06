
		<?php
			include_once 'conexion.php';
			include_once 'header.php';
			include 'resultados.php';
			  
			$consulta_recurso = ("SELECT * FROM recurso");
			$consulta_categoria = ("SELECT * FROM categoria");
			$result_recurso = mysqli_query($con, $consulta_recurso);
			$result_categoria = mysqli_query($con, $consulta_categoria);

			$nomUsuari = $_SESSION['nom'];
			$user_id = $_SESSION['id_user'];

		?>
		<div class="container" style="margin-top:10px">
			<div class="row " style="width:75%;margin-top:20px">
				<h1 style="margin-left:15px">Filtar Resultados</h1>
				<div class="col-md-20" style="margin-left:20px">
					<div class="panel panel-default">
						<div class="panel-body">
							<div class="form-inline form-group">
								<form action="user.php" method="GET">
									<div class="checkbox">
										<label class="checkbox-inline">
											<input id="checkbox" type="checkbox" name="estado_recurso[]" value="0">Disponible
										</label>
										<label class="checkbox-inline">
											<input id="checkbox" type="checkbox" name="estado_recurso[]" value="1">Ocupado
										</label>
										<select class="btn btn-default pull-right" id="categoria" name="categoria">
											<option value="">Seleccionar categoría</option>
											<?php
											while($fila=mysqli_fetch_array($result_categoria)){
												echo utf8_encode("<option value=\"$fila[id]\">$fila[nombre]</option>");
											}
								        	?>

								    </select>

									</div>
									<div class="btns">
										<button class="btn btn-success" id="botonEnviar" type="submit">Enviar</button>
										<button class="btn btn-danger" id="botonCancelar" type="reset">Cancelar</button>
										<button class="btn btn-info" id="botonAyuda" type="button">?</button>
									</div>	
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div>
			<?php
				mostrarConsulta();
			?>
		</div>

		<script type="text/javascript">
			$('#botonAyuda').popover({
				title: 'Ayuda',
				content: 'Rellena los campos necesarios',
				placement: 'right'
			});
		</script>
		


		<!-- VENTANA MODAL QUE APARECERÁ CUANDO SE ESCRIBA LA MEJORA -->
		<div class="modal fade" id="helloModal">
		    <div class="modal-dialog">
		        <div class="modal-content">
		            <div class="modal-header">
		                <button type="button" class="close" id="close" data-dismiss="modal" aria-hidden="true">×</button>
		                <h4 class="modal-title">Incidencias Club Estudio</h4>
		            </div>
		            <div class="modal-body">
							<p>Tu incidencia ha sido registrada. En breve sabrás el estado de la incidencia.</p>
							<p><b>Muchas grácias!</b></p>
		            </div>
		        </div>
		    </div>
		</div>

<?php  
	include "footer.php";
?>