<?php
	include_once 'conexion.php';
	include_once 'header_admin.php';
	  
	$consulta_incidencias = ("SELECT * FROM incidencia");
	$result_incidencias = mysqli_query($con, $consulta_incidencias);

	$consulta_recursos = ("SELECT * FROM recurso");
	$result_recursos = mysqli_query($con, $consulta_recursos);
?>

	<div class="container" style="margin-top:10px">
		<!-- FORMULARIO PRINCIPAL DE DONDE OBTENDRÁ LOS DATOS LA TABLA -->
		<form id="frmIncidencia" name="frmIncidencia" role="form" action="updateReg.php">

            <!-- PARTE DONDE SE ENCUENTRA EL TITULO, AREA Y DESCRIPCION DE LA MEJORA -->
			<div class="row" style="width:100%;margin-top:20px">
			    <h1 style="margin-left:15px">Formulario de incidencias</h1>
				<div class="col-md-20" style="margin-left:20px">
		            <div class="panel panel-default">
		                <div class="panel-body"> 
		                	<div class="form-inline form-group"> 
			                	<input name="titulo" id="titulo" type="text" class="form-control" placeholder="Titulo de la incidencia" maxlength="50" size="60" />
			                	<select class="btn btn-default" id="recurso" name="recurso">
									<option value="">Seleccionar recurso</option>
									<?php
									while($fila=mysqli_fetch_array($result_recursos)){
										echo utf8_encode("<option value=\"$fila[id_recurso]\">$fila[nombre]</option>");
									}
						        	?>
							    </select>
		                	</div>
			                <div class="form-group">
			                	<textarea class="form-control counted" name="descripcion" id="descripcion" placeholder="Descripción" rows="5" style="margin-bottom:10px;width:100%"></textarea>
		                	</div>
		                	<h6 class="pull-left" id="counter">500 caràcters encara</h6>
	            			<button class="btn btn-flat btn-primary pull-right" id="enviar" name="enviar" type="submit">Envia</button>
		                </div>
		            </div>
	            </div>             
		    </div>
		</form>
	</div>


<?php  
	include 'footer.php';
?>