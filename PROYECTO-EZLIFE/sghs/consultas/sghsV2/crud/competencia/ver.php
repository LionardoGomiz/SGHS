<?php
require("../class/competencia.php");
include "header.php";
?>
<p>
     <a href="create.php" class="btn btn-primary btn-md"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Agregar Competencia</a><br/>
</p>

<p>
     <a href="../index.php" class="btn btn-success btn-md"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span> Regresar</a>
</p>

<table id="ghatable" class="display table table-bordered table-stripe" cellspacing="0" width="100%">
     <thead>
          <tr>
               <th>CODIGO</th>
               <th>COMPETENCIAS</th>
               <th>MODIFICAR</th>
               <th>ELIMINAR</th>
          </tr>
     </thead>
     <tbody>
          <?php
          $objCompetencia = new Competencia();
          $competencias = $objCompetencia->competencia();
          if(sizeof($competencias) > 0){
               foreach ($competencias as $row){
                    ?>
                    <tr>
                         <td><?php echo $row['cod_compe'] ?></td>
                         <td><?php echo $row['nom_compe'] ?></td>
                         <td>
                              <a href="update.php?u=<?php echo $row['cod_compe'] ?>"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Editar</a>
                         </td>
                         <td>
                              <a onclick="return confirm('Desea eliminar el registro')" href="delete.php?d=<?php echo $row['cod_compe'] ?>"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Eliminar</a>
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