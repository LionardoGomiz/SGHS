<?php
require("../class/cronograma.php");
include "header.php";
?>
<p>
     <a href="CrudLider/crear/horario.php" class="btn btn-primary btn-md"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Agregar Cronograma</a><br/>
</p>
<table id="ghatable" class="display table table-bordered table-stripe" cellspacing="0" width="100%">
     <thead>
          <tr>
               <th>Codigo</th>
               <th>Ficha</th>
               <th>MODIFICAR</th>
               <th>ELIMINAR</th>
          </tr>
     </thead>
     <tbody>
          <?php
          $objSedes = new Cronograma();
          $sedes = $objSedes->cronograma();
          if(sizeof($sedes) > 0){
               foreach ($sedes as $row){
                    ?>
                    <tr>
                         <td><?php echo $row['cod_detalles'] ?></td>
                         <td><?php echo $row['cod_ficha'] ?></td>
                         <td>
                              <a href="update.php?u=<?php echo $row['cod_detalles'] ?>"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Editar</a>
                         </td>
                         <td>
                              <a onclick="return confirm('Desea eliminar el registro')" href="delete.php?d=<?php echo $row['cod_detalles'] ?>"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Eliminar</a>
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