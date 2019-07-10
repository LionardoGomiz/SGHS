<!DOCTYPE html>
<html lang="en">

<head>

    <link href='img/logo.png' rel='icon' type='image/x-icon'/>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Instructores</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css"/>
    <!-- Custom CSS -->
    <link href="css/business-casual.css" rel="stylesheet">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic" rel="stylesheet" type="text/css">
    </head>
    <body>
  <?php
  include("coneccionBD.php");
 
  ?>

  <center>
  <div class="container" align="center">
  <div class="row">
  
    <div class="">

      <div class="caption">
      
      <h2 align="center"><font color="#db6c0a"> Instructor </font></h2>

      <form action="instructorpdf.php" method="POST">

  <div class="row">
 
      <div class="col-md-12">
      <div class="form-group">
        <p><label > Año </label>
          <select name="s_anio" id="s_anio" class="btn btn-default dropdown-toggle" required>
            <div class="btn btn-default dropdown-toggle"> 
              <option value=""> Seleccione año </option>
                <?PHP
                  $consultap ="SELECT DISTINCT cod_temp FROM temporada ORDER BY 1";
                  $resultadoProducto=mysqli_query($conexion,$consultap) or die('Error');
                                                          
                    while ($filla=mysqli_fetch_array($resultadoProducto,MYSQLI_BOTH)){                                                
                    echo "<option value='".$filla[0]."'>".$filla[0]."</option>";
                      
                    }
                
                ?>

          </select><br><br></p>
      </div>
      </div>


      <div class="col-md-12">
      <div class="form-group">
        <p><label > Trimestre </label>
          <select name="s_trimes" id="s_trimes" class="btn btn-default dropdown-toggle" required>
            <option value=""> Seleccione trimestre </option>
              <?PHP
                $consultap ="SELECT cod_trimestre as codigo ,nom_trimestre as nombre FROM trimestre order by 1";
                $resultadoProducto=mysqli_query($conexion,$consultap) or die('Error');
                                                          
                  while ($filla=mysqli_fetch_array($resultadoProducto,MYSQLI_BOTH)){                                                
                  echo "<option value='".$filla[0]."'>".$filla[1]."</option>";
                  }
              ?>

          </select><br><br></p>
      </div>
      </div>

  </div>


 <div class="row">

      <div class="col-md-12">
      <div class="form-group">
        <p> <label> Instructor </label>           
          <select name="s_instructor" id="s_instructor" class="btn btn-default dropdown-toggle" required>    
            <option value="" > Seleccione instructor </option>
              <?PHP
                $consultap ="SELECT DISTINCT cod_instructor as codigo,CONCAT(nom_instructor,' ',ape_instructor) as nombre FROM instructor ORDER BY 2";
                $resultadoProducto=mysqli_query($conexion,$consultap) or die('Error');
                                                          
                  while ($filla=mysqli_fetch_array($resultadoProducto,MYSQLI_BOTH)){                                                
                  echo "<option value='".$filla[0]."'>".$filla[1]."</option>";
                }
              ?>
          </select><br><br></p>

        </div>
        </div>

  </div>
        
 
        <p><td><input type="submit" class="btn btn-success btn-sm" value="Consultar"/></td></p>
      </div>
    </div>
  </div>
</div>
</center>

</body>
<script src="css/style.css"></script>
</html>
