<?php
header('Content-Type: text/html; charset=ISO-8859-1');
?>

 <?php

 $user="root";
 $pass="";
 $server="localhost";
 $bd="sghv_v1";

 $con = mysqli_connect($server,$user,$pass,$bd);

 $result = mysqli_query($con,"SELECT * FROM actividad_aprendizaje");

 while ($row = mysqli_fetch_array($result)){

 	 echo '<option value="'.$row['cod_acti'].'">'.$row['nom_acti'].'</option>';

 }

 ?>