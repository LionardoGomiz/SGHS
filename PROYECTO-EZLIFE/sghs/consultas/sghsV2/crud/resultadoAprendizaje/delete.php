<?php
require("../class/resultadoAprendizaje.php");
if(isset($_GET['d'])){
	$resultado_aprendizaje = new ResultadoAprendizaje();
	$resultado_aprendizaje->delete($_GET["d"]);
}
?>
