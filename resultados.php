<?php
	include 'conexion.php';
	include_once 'header.php';


	//como la sentencia SIEMPRE va a buscar todos los registros de la tabla producto, pongo en la variable $sql esa parte de la sentencia que SI o SI, va a contener
	$sql = "SELECT * FROM recurso WHERE ";

	//VERSION BETA
	//controlar checkbox
	if(!isset($_REQUEST['estado_recurso'])){
		echo "Selecciona disponible u ocupado";
	} else {
		$count = 0;
		foreach ($_REQUEST['estado_recurso'] as $opcionEstado[]) {
		$count+=1;			
		}

		if ($count==0) {
			$sql = "";
		}
		if ($count>0) {
			$sql.= " (estado=$opcionEstado[0]";
			if ($count>1){
				$sql.= " OR estado=$opcionEstado[1]";
			}
			$sql.=")";
		}

		//DATOS MUNICIPIO
		if(($_REQUEST['categoria'] == '')){
			// echo "No se muestra municipio";
		}
		else {
		$categoria=$_REQUEST['categoria'];
		$sql .= " AND categoria = $categoria";
		}


		$datos = mysqli_query($con, $sql);
		//extraemos los productos uno a uno en la variable $anuncio que es un array
		while($recurso = mysqli_fetch_array($datos)){
			echo "<b>Nombre:</b>";
			echo utf8_encode($recurso['nombre']);
			echo "<br/>";
			echo "<b>Contenido:</b> ";
			echo utf8_encode($recurso['descr']);
			echo "<br/>";

			$fichero="img/$recurso[img]";
			if(file_exists($fichero)&&(($recurso['img']) != '')){
				echo "<img src='$fichero' width='80' heigth='80' ><br/><br/><br/>";
			}
			else{
				echo "<img src ='img/no_disponible.jpg'/>";
			}
			?>
			<a href="reservar.php?id_recurso=<?php echo $recurso['id_recurso']; ?>">Reservar</a>


			<button type="button" class="btn btn-primary" id="botonOpciones" data-toggle="modal" data-target="#modalOpciones">Opciones</button>
			<div class="modal fade" id="modalOpciones">
	            <div class="modal-dialog">
	                <div class="modal-content">
	                    <div class="modal-header">
	                        <h4 class="modal-title">Reserva del recurso</h4>
	                    </div>
	                    
	                    <div class="modal-body">
	                        <div class="form-group">
	                            <label class="control-label col-sm-3" for="user">Nombre del recurso:</label>
	                            <div class="col-sm-7">          
	                                <input type="text" class="form-control" id="nombre" name="nombre" readonly />
	                            </div>
	                        </div><br /><br />
	                        <div class="form-group">
	                            <label class="control-label col-sm-3" for="passwd">Tipo de recurso:</label>
	                            <div class="col-sm-7">          
	                                <input type="text" class="form-control" id="tipo" name="tipo" value="hola" readonly />
	                            </div>
	                        </div><br /><br />
	                    </div>

	                    <div class="modal-footer">
	                        <button type="submit" class="btn btn-success" id="reservar">Reservar</button>
	                        <button type="submit" class="btn btn-primary" id="liberar">Liberar</button>
	                        <button type="submit" class="btn btn-danger" id="cancelar" onclick="cerrar()">Salir</button>
	                    </div>
	                </div>
	            </div>
	        </div>

	        <script>
	        	$('#modalOpciones').modal({
	        		show: false,
	        		backdrop: 'static',
	        		keyboard: false,
	        	})

	        	function cerrar(){
	        		$('#modalOpciones').modal('hide');
	        	}
	        </script>

			<?php
			echo "<br/><br>";
			
		}
	}
	//cerramos la conexión con la base de datos
	mysqli_close($con);


	include "footer.php";

?>