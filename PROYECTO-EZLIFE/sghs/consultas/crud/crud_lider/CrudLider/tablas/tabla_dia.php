
 <?php

 $user="root";
 $pass="";
 $server="localhost";
 $bd="sghv_v1";

 $con = mysqli_connect($server,$user,$pass,$bd);

 $result = mysqli_query($con,"SELECT * FROM dia");

 while ($row = mysqli_fetch_array($result)){

 	 echo '<option value="'.$row['cod_dia'].'">'.$row['nom_dia'].'</option>';

 }

 ?>
 