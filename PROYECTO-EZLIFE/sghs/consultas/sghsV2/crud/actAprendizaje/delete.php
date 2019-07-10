<?php
require("../class/actAprendizaje.php");
if(isset($_GET['d'])){
	$programa = new Actaprendizaje();
	$programa->delete($_GET["d"]);
}
?>
