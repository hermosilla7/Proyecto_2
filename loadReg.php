<?php
include 'conexion.php';

try{ 

	//$conn = new PDO("mysql:host=$server; dbname=$database; charset=utf8", $usuario, $pwd);
	$conn->exec("set names utf8");
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$sql = $conn->prepare("SELECT * FROM club_estudio");
			$sql -> execute();	
			$resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
			$cuenta = $sql->rowCount();

			if ($cuenta!=0){
				echo json_encode($resultado);
			}else{
				/*
				echo json_encode(array(
				"ERROR" => "No hi ha cap operació a llistar "
				));
				*/
				echo json_encode($resultado);
			}			
		
		
}catch(PDOException $e){
			//$ErrorTramesa++;
			echo json_encode(array(
				"ERROR" => $e->getMessage()."\n"
				));
			//$log=$log."*ERROR: " . ;
			//$ErrorDescripcio=$ErrorDescripcio."*ERROR: " . $e->getMessage()."\n";
}

?>