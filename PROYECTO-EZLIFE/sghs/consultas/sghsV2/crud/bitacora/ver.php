<?php
require("bitacora.php");
include "header.php";
?>

<table id="ghatable" class="display table table-bordered table-stripe" cellspacing="0" width="100%">
     <thead>
          <tr>
               <th>Usuario</th>
               <th>Rol</th>
               <th>Intentos</th>
               <th>Fecha Entrada</th>
               <th>Fecha Salida</th>
          </tr>
     </thead>
     <tbody>
          <?php
          $objInstructor = new Bitacora();
          $instructor = $objInstructor->bitacora();
          if(sizeof($instructor) > 0){
               foreach ($instructor as $row){
                    ?>
                    <tr> 
                         <td><?php echo $row['usuario'] ?></td>
                         <td><?php echo $row['rol'] ?></td>
                         <td><?php echo $row['intentos'] ?></td>
                         <td><?php echo $row['fecha_entrada'] ?></td>
                         <td><?php echo $row['fecha_salida'] ?></td>
                    </tr>
                    <?php
               }
          }
          ?>
     </tbody>
</table>	    
<?php
include "footer.php";
?>