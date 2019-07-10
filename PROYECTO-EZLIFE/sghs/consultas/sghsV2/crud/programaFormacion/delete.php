<?php
require("../class/programa.php");
if(isset($_GET['d'])){
	$programa = new Programa();
	$programa->delete($_GET["d"]);
}
?>
