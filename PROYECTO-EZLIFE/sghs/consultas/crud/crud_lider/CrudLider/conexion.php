<?php
	$mysqli = new mysqli('localhost', 'root', '', 'sghv_v1');
	
	if($mysqli->connect_error){
		
		die('Error en la conexion' . $mysql->connect_error);

	}

	
?>