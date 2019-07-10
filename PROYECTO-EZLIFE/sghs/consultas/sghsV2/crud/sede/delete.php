<?php
require("../class/sede.php");
if(isset($_GET['d'])){
	$programa = new Sede();
	$programa->delete($_GET["d"]);
}
?>
