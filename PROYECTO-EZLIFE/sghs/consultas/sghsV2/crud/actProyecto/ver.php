<?php
require("../class/actProyecto.php");
include "header.php";
?>
<p>
     <a href="create.php" class="btn btn-primary btn-md"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Agregar Actividad de proyecto</a><br/>
</p>

<p>
     <a href="../index.php" class="btn btn-success btn-md"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span> Regresar</a>
</p>

<table id="ghatable" class="display table table-bordered table-stripe" cellspacing="0" width="100%">
     <thead>
          <tr>
               <th>Codigo</th>
               <th>ACTIVIDADES DE PROYECTO</th>
               <th>Fase</th>
               <th>MODIFICAR</th>
               <th>ELIMINAR</th>
          </tr>
     </thead>
     <tbody>
          <?php
          $objActproyecto = new Actproyecto();
          $actproyectos = $objActproyecto->Actproyecto();
          if(sizeof($actproyectos) > 0){
               foreach ($actproyectos as $row){
                    ?>
                    <tr>
                         <td><?php echo $row['cod_act_proyecto'] ?></td>
                         <td><?php echo $row['nom_act_proyecto'] ?></td>
                         <td><?php echo $row['nom_fase'] ?></td>
                         <td>
                              <a href="update.php?u=<?php echo $row['cod_act_proyecto'] ?>"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Editar</a>
                         </td>
                         <td>
                              <a onclick="return confirm('Desea eliminar el registro')" href="delete.php?d=<?php echo $row['cod_act_proyecto'] ?>"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Eliminar</a>
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