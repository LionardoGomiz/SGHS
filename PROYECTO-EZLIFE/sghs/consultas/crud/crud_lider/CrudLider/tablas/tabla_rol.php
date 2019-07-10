<?php
header('Content-Type: text/html; charset=ISO-8859-1');
?>


 <?php

 $user="root";
 $pass="";
 $server="localhost";
 $bd="horarios";

 $con = mysqli_connect($server,$user,$pass,$bd);

 $result = mysqli_query($con,"SELECT * FROM tipo_usuario");

 while ($row = mysqli_fetch_array($result)){

 	 echo '<option value="'.$row['id'].'">'.$row['tipo'].'</option>';

 }

 ?>
 