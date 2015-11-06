<?php
function mostrarConsulta (){
	include 'conexion.php';


	//como la sentencia SIEMPRE va a buscar todos los registros de la tabla producto, pongo en la variable $sql esa parte de la sentencia que SI o SI, va a contener
	$sql = "SELECT * FROM recurso WHERE ";

	// if(!isset($_REQUEST['estado_recurso'])){
	// 	echo "ISSET YES";
	// }

	// if(isset($_REQUEST['estado_recurso'])){
	// 	echo "ISSET NO";
	// }

	// if($_REQUEST['estado_recurso'] == null){
	// 	echo "NULL YES";
	// }

	// if($_REQUEST['estado_recurso'] == ""){
	// 	echo "VACIO YES";
	// }

	//VERSION BETA
	//controlar checkbox
	if(!isset($_REQUEST['estado_recurso'])){
		// echo "AAAAAAAAAAAAAAAAAAAAAAAAAA";
		$sql = "SELECT * FROM recurso";
		$datos = mysqli_query($con, $sql);
		//extraemos los productos uno a uno en la variable $anuncio que es un array
		while($recurso = mysqli_fetch_array($datos)){
			echo "<div class='contendor'>";
			echo"<div class='textseccion'><b>Nombre:</b> ";
			echo utf8_encode($recurso['nombre']);
			echo "<br/>";
			echo "<b>Contenido:</b> ";
			echo utf8_encode($recurso['descr']);

			echo "<br/>";


			echo "</div><br/>";
			echo "<div class='botonera'>";
 			
 			echo ' <div class="btn btn-primary" id="btnLiberar'.$recurso['id_recurso'].'" name="btnLiberar">';
?>
				<a href="liberar.php?id_recurso=<?php echo $recurso['id_recurso']; ?>">Liberar</a>
            </div> 
<?php                
				echo '<div class="btn btn-success" id="btnReservar'.$recurso['id_recurso'].'" name="btnReservar">';
?>      	
    				<a href="reservar.php?id_recurso=<?php echo $recurso['id_recurso']; ?>">Reservar</a>
				</div>
<?php                 
            echo"  </div>";


			$fichero="img/$recurso[img]";
			if(file_exists($fichero)&&(($recurso['img']) != '')){
				echo "<div class='contimg'><img src='$fichero' width='250' heigth='250' ></div>";
			}
			else{
				echo "<div class='contimg'><img src ='img/no_disponible.jpg'width='250' heigth='250'/></div>";
			}
			
			echo"</div>";
			echo "<br/><br>";

			if ($recurso["estado"] == "0"){
				echo 	"<script>
					        $(document).ready(function() {
								$(document.getElementById('btnLiberar".$recurso['id_recurso']."')).attr('disabled', true);				
								$(document.getElementById('btnReservar".$recurso['id_recurso']."')).attr('disabled', false);
							});
					    </script>";
			}else if ($recurso["estado"] == "1"){
				echo 	"<script>
					        $(document).ready(function() {
								$(document.getElementById('btnLiberar".$recurso['id_recurso']."')).attr('disabled', false);
								$(document.getElementById('btnReservar".$recurso['id_recurso']."')).attr('disabled', true);
							});
					    </script>";
			} else {
				echo 	"<script>
					        $(document).ready(function() {
								$(document.getElementById('btnLiberar".$recurso['id_recurso']."')).attr('disabled', true);
								$(document.getElementById('btnReservar".$recurso['id_recurso']."')).attr('disabled', true);
							});
					    </script>";
			}
		}
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
			echo "<div class='contendor'>";
			echo"<div class='textseccion'><b>Nombre:</b> ";
			echo utf8_encode($recurso['nombre']);
			echo "<br/>";
			echo "<b>Contenido:</b> ";
			echo utf8_encode($recurso['descr']);
			echo "</div><br/>";
			echo "<div class='botonera'>";
			
			echo ' <div class="btn btn-primary" id="btnLiberar'.$recurso['id_recurso'].'" name="btnLiberar">';
?>             
				<a href="liberar.php?id_recurso=<?php echo $recurso['id_recurso']; ?>">Liberar</a>
            </div> 
<?php                
				echo '<div class="btn btn-success" id="btnReservar'.$recurso['id_recurso'].'" name="btnReservar">';
?>      	
    				<a href="reservar.php?id_recurso=<?php echo $recurso['id_recurso']; ?>">Reservar</a>
				</div>
<?php   
	        echo"</div>";


			$fichero="img/$recurso[img]";
			if(file_exists($fichero)&&(($recurso['img']) != '')){
				echo "<div class='contimg'><img src='$fichero' width='250' heigth='250' ></div>";
			}
			else{
				echo "<div class='contimg'><img src ='img/no_disponible.jpg'width='250' heigth='250'/></div>";
			}
			
			echo"</div>";
			
			echo "<br/><br>";

			if ($recurso["estado"] == "0"){
				echo 	"<script>
					        $(document).ready(function() {
								$(document.getElementById('btnLiberar".$recurso['id_recurso']."')).attr('disabled', true);				
								$(document.getElementById('btnReservar".$recurso['id_recurso']."')).attr('disabled', false);
							});
					    </script>";
			}else if ($recurso["estado"] == "1"){
				echo 	"<script>
					        $(document).ready(function() {
								$(document.getElementById('btnLiberar".$recurso['id_recurso']."')).attr('disabled', false);
								$(document.getElementById('btnReservar".$recurso['id_recurso']."')).attr('disabled', true);
							});
					    </script>";
			} else {
				echo 	"<script>
					        $(document).ready(function() {
								$(document.getElementById('btnLiberar".$recurso['id_recurso']."')).attr('disabled', true);
								$(document.getElementById('btnReservar".$recurso['id_recurso']."')).attr('disabled', true);
							});
					    </script>";
			}

		}
	}

	//cerramos la conexión con la base de datos
	mysqli_close($con);
}
?>