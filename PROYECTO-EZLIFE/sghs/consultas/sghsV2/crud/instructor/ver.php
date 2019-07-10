<?php
require("../class/instructor.php");
include "header.php";
?>
<p>
     <a href="create.php" class="btn btn-primary btn-md"><span class="" aria-hidden="true"></span> Agregar Instructor</a><br/>
</p>

<p>
     <a href="../index.php" class="btn btn-success btn-md"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span> Regresar</a>
</p>

<table id="ghatable" class="display table table-bordered table-stripe" cellspacing="0" width="100%">
     <thead>
          <tr>
               <th>Identificación Instructor</th>
               <th>Nombre Instructor</th>
               <th>Apellido Instructor</th>
               <th>Especialidad</th>
               <th>MODIFICAR</th>
               <th>ELIMINAR</th>
          </tr>
     </thead>
     <tbody>
          <?php
          $objInstructor = new Instructor();
          $instructor = $objInstructor->instructor();
          if(sizeof($instructor) > 0){
               foreach ($instructor as $row){
                    ?>
                    <tr> 
                         <td><?php echo $row['cod_instructor'] ?></td>
                         <td><?php echo $row['nom_instructor'] ?></td>
                         <td><?php echo $row['ape_instructor'] ?></td>
                         <td><?php echo $row['especialidad'] ?></td>
                         <td>
                              <a href="update.php?u=<?php echo $row['cod_instructor'] ?>"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Editar</a>
                         </td>
                         <td>
                              <a onclick="return confirm('Desea eliminar el registro')" href="delete.php?d=<?php echo $row['cod_instructor'] ?>"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Eliminar</a>
                         </td>
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