<?php
require("../class/resultadoAprendizaje.php");
include "header.php";
?>
<p>
     <a href="create.php" class="btn btn-primary btn-md"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Agregar Resultado de Aprendizaje</a><br/>
</p>

<p>
     <a href="../index.php" class="btn btn-success btn-md"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span> Regresar</a>
</p>

<table id="ghatable" class="display table table-bordered table-stripe" cellspacing="0" width="100%">
     <thead>
          <tr>
               <th>CODIGO RESULTADO DE APRENDIZAJE</th>
               <th>RESULTADO DE APRENDIZAJE</th>
               <th>MODIFICAR</th>
               <th>ELIMINAR</th>
          </tr>
     </thead>
     <tbody>
          <?php
          $objResultadoAprendizaje = new ResultadoAprendizaje();
          $resultadoaprendizaje = $objResultadoAprendizaje->resultadoprendizaje();
          if(sizeof($resultadoaprendizaje) > 0){
               foreach ($resultadoaprendizaje as $row){
                    ?>
                    <tr>
                         <td><?php echo $row['cod_result'] ?></td>
                         <td><?php echo $row['nom_result'] ?></td>
                         <td>
                              <a href="update.php?u=<?php echo $row['cod_result'] ?>"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Editar</a>
                         </td>
                         <td>
                              <a onclick="return confirm('Desea eliminar el registro')" href="delete.php?d=<?php echo $row['cod_result'] ?>"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Eliminar</a>
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