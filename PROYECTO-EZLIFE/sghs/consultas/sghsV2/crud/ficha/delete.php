<?php
require("../class/ficha.php");
if(isset($_GET['d'])){
	$persona = new Ficha();
	$persona->delete($_GET["d"]);
}
?>
