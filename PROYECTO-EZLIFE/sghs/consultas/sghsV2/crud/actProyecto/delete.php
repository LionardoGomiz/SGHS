<?php
require("../class/actProyecto.php");
if(isset($_GET['d'])){
	$programa = new ActProyecto();
	$programa->delete($_GET["d"]);
}
?>
