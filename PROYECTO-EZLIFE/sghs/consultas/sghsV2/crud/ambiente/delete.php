<?php
require("../class/ambiente.php");
if(isset($_GET['d'])){
	$persona = new Ambiente();
	$persona->delete($_GET["d"]);
}
?>
