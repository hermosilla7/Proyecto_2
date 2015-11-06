<?php
function mostrarReservasAdmin(){
	include 'conexion.php';


	//como la sentencia SIEMPRE va a buscar todos los registros de la tabla producto, pongo en la variable $sql_reserva esa parte de la sentencia que SI o SI, va a contener


	$sql_reserva = "SELECT * FROM reserva WHERE ";

	$recurso = $_REQUEST['recurso'];
	$sql_reserva .= "id_recurso = $recurso ORDER BY id_reserva DESC";

		$datos_reserva = mysqli_query($con, $sql_reserva);
		//extraemos los productos uno a uno en la variable $anuncio que es un array
		if ($recurso != ""){
			while($reserva = mysqli_fetch_array($datos_reserva)){

				$sql_recurso = "SELECT * FROM recurso, reserva WHERE $reserva[id_recurso] = recurso.id_recurso";
				$sql_usuario = "SELECT * FROM usuario WHERE $reserva[id_user] = usuario.id_user";
				$datos_recurso = mysqli_query($con, $sql_recurso);
				$datos_usuario = mysqli_query($con, $sql_usuario);
				$recurso = mysqli_fetch_array($datos_recurso);
				$usuario = mysqli_fetch_array($datos_usuario);
				echo "<div class='contendor2'>";
				echo "<div class='textseccion2'><b>Usuario:</b>";
				echo utf8_encode($usuario['nom']);
				echo "<br/>";
				echo "<b>Recurso:</b> ";
				echo utf8_encode($recurso['nombre']);
				echo "<br/>";
				echo "<b>Fecha inicio:</b> ";
				echo utf8_encode($reserva['dateini']);
				echo "<br/>";
				echo "<b>Fecha fin:</b> ";
				echo utf8_encode($reserva['datefi']);
				echo "<br></div><br/>";

				$fichero="img/$recurso[img]";
				if(file_exists($fichero)&&(($recurso['img']) != '')){
					echo "<div class='contimg'><img src='$fichero' width='250' heigth='250' ></div>";
				}
				else{
					echo "<div class='contimg'><img src ='img/no_disponible.jpg'width='250' heigth='250'/></div>";
				}
			
			echo "</div>";
			echo"</div>";

			echo "<br>";
			}
		}
		else{
				$sql_default = "SELECT * FROM reserva ORDER BY id_reserva DESC";
				$datos_default = mysqli_query($con, $sql_default);
				while($reserva = mysqli_fetch_array($datos_default)){
					$sql_recurso = "SELECT * FROM recurso, reserva WHERE $reserva[id_recurso] = recurso.id_recurso";
					$sql_usuario = "SELECT * FROM usuario WHERE $reserva[id_user] = usuario.id_user";
					$datos_recurso = mysqli_query($con, $sql_recurso);
					$datos_usuario = mysqli_query($con, $sql_usuario);
					$recurso = mysqli_fetch_array($datos_recurso);
					$usuario = mysqli_fetch_array($datos_usuario);
					echo "<div class='contendor2'>";
					echo "<div class='textseccion2'><b>Usuario:</b>";
					echo utf8_encode($usuario['nom']);
					echo "<br/>";
					echo "<b>Recurso:</b> ";
					echo utf8_encode($recurso['nombre']);
					echo "<br/>";
					echo "<b>Fecha inicio:</b> ";
					echo utf8_encode($reserva['dateini']);
					echo "<br/>";
					echo "<b>Fecha fin:</b> ";
					echo utf8_encode($reserva['datefi']);
					echo "<br></div><br/>";
					$fichero="img/$recurso[img]";
				if(file_exists($fichero)&&(($recurso['img']) != '')){
					echo "<div class='contimg'><img src='$fichero' width='250' heigth='250' ></div>";
				}
				else{
					echo "<div class='contimg'><img src ='img/no_disponible.jpg'width='250' heigth='250'/></div>";
				}
			
			echo "</div>";
					echo"</div>";
					echo "<br>";
	}
}

		

	mysqli_close($con);
}
?>