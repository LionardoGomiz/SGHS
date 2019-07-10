<?php
require("../class/ficha.php");

include "header.php";
?>
<p>
     <a href="create.php" class="btn btn-primary btn-md"><span class="" aria-hidden="true"></span> Agregar Ficha</a><br/>
</p>

<p>
     <a href="../index.php" class="btn btn-success btn-md"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span> Regresar</a>
</p>

<table id="ghatable" class="display table table-bordered table-stripe" cellspacing="0" width="100%">
     <thead>
          <tr>
               <th>Ficha</th>
               <th>Fecha inicio</th>
               <th>fecha salida</th>
               <th>Programa</th>
               <th>Trimestre</th>
               <th>MODIFICAR</th>
               <th>ELIMINAR</th>
          </tr>
     </thead>
     <tbody>
          <?php
          $objAmbiente = new Ficha();
          $ambiente = $objAmbiente->ficha();
          if(sizeof($ambiente) > 0){
               foreach ($ambiente as $row){
                    ?>
                    <tr>
                         <td><?php echo $row['cod_ficha'] ?></td>
                         <td><?php echo $row['fec_inicio'] ?></td>
                         <td><?php echo $row['fec_fin'] ?></td>
                         <td><?php echo $row['nom_programa'] ?></td>
                         <td><?php echo $row['nom_trimestre'] ?></td>

                        
                         <td>
                              <a href="update.php?u=<?php echo $row['cod_ficha'] ?>"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Editar</a>
                         </td>
                         <td>
                              <a onclick="return confirm('Desea eliminar el registro')" href="delete.php?d=<?php echo $row['cod_ficha'] ?>"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Eliminar</a>
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