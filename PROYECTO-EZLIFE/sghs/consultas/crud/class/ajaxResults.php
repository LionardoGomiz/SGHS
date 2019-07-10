<?php 


	include 'rel_programa.php';



	if (isset($_POST['idpadre'])) {
		$Objprograma = new programa();
		$data= $Objprograma->programabycode($_POST['idpadre']); 
		foreach ($data as  $value) {

		 	echo '<option value="'.$value["cp"].'">'.$value["np"].'</option>';
		 } 
	}else{
		echo "no trae nada";
	}
	
 ?>