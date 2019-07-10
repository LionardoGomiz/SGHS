<?php
header('Content-Type: text/html; charset=ISO-8859-1');
?>

 <?php

 $user="root";
 $pass="";
 $server="localhost";
 $bd="sghv_v1";

 $con = mysqli_connect($server,$user,$pass,$bd);

 $result = mysqli_query($con,"SELECT * FROM duracion");

 while ($row = mysqli_fetch_array($result)){

 	 echo '<option value="'.$row['cod_duracion'].'">'.$row['hora_inicio'].' - '.$row['hora_fin'].' </option>';

 }

 ?>
 