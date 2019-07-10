<?php
require("../class/competencia.php");
if(isset($_GET['d'])){
	$programa = new Competencia();
	$programa->delete($_GET["d"]);
}
?>
