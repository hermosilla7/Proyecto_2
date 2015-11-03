<?php
// include_once 'cabecera.php';
include 'conexion.php';

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
		echo utf8_encode($recurso['nom']);
		echo "<br/>";
		echo "<b>Contenido:</b> ";
		echo utf8_encode($recurso['descr']);
		echo "<br/>";

		$fichero="img/$recurso[img]";
		if(file_exists($fichero)&&(($recurso['img']) != '')){
			echo "<img src='$fichero' width='200' heigth='200' ><br/><br/><br/>";
		}
		else{
			echo "<img src ='img/no_disponible.jpg'/><br/><br>";
		}

		
	}
}
//cerramos la conexión con la base de datos
mysqli_close($con);
?>

<?php include "footer.php";