<?php
require("../class/instructor.php");
if(isset($_GET['d'])){
	$persona = new Instructor();
	$persona->delete($_GET["d"]);
}
?>
