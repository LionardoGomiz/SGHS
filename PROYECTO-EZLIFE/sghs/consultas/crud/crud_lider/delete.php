<?php
require("../class/cronograma.php");
if(isset($_GET['d'])){
	$persona = new Cronograma();
	$persona->delete($_GET["d"]);
}
?>
