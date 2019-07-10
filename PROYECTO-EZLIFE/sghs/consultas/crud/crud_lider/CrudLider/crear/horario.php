  <?php
    header('Content-Type: text/html; charset=ISO-8859-1');
  ?>

  <?php
  /*
  session_start();
  require '../funcs/conexion.php';
  include '../funcs/funcs.php';
  if(!isset($_SESSION["id_usuario"])){ 
  header("Location: ../login.php");
  }
  $idUsuario = $_SESSION['id_usuario'];
  $sql = "SELECT id, nombre FROM administrador WHERE id = '$idUsuario'";
  $result = $mysqli->query($sql);
  $row = $result->fetch_assoc();
  */
  ?>

    <head>
    <link href='../../img/logo.png' rel='icon' type='image/x-icon'/>
      <meta name="viewport" content="width=device-width, initial-scale=1">
       <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/business-casual.css" rel="stylesheet">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic" rel="stylesheet" type="text/css">

      <script src="../js/jquery-3.1.1.min.js"></script>
      <script src="../js/bootstrap.min.js"></script>
      <script type="text/javascript"></script>
      <script type="text/javascript">
      $("document").ready(function (){
        $( "#cod_programa" ).load( "../tablas/tabla_programa.php" );
      })
      </script>

      <script type="text/javascript">
      $("document").ready(function (){
        $( "#cod_trimestre" ).load( "../tablas/tabla_trimestre.php" );
      })
      </script>

      <script type="text/javascript">
      $("document").ready(function (){
        $( "#cod_ficha" ).load( "../tablas/tabla_ficha.php" );
      })
      </script>

      <script type="text/javascript">
      $("document").ready(function (){
        $( "#cod_temp" ).load( "../tablas/tabla_temporada.php" );
      })
      </script>

      <script type="text/javascript">
      $("document").ready(function (){
        $( "#cod_jornada" ).load( "../tablas/tabla_jornada.php" );
      })
      </script>

      <script type="text/javascript">
      $("document").ready(function (){
        $( "#cod_compe" ).load( "../tablas/tabla_competencia.php" );
      })
      </script>

      <script type="text/javascript">
      $("document").ready(function (){
        $( "#cod_instructor" ).load( "../tablas/tabla_instructor.php" );
      })
      </script>

      <script type="text/javascript">
      $("document").ready(function (){
        $( "#cod_fase" ).load( "../tablas/tabla_fase.php" );
      })
      </script>

      <script type="text/javascript">
      $("document").ready(function (){
        $( "#cod_act_proyecto" ).load( "../tablas/tabla_acti_proyecto.php" );
      })
      </script>

      <script type="text/javascript">
      $("document").ready(function (){
        $( "#cod_acti" ).load( "../tablas/tabla_acti_aprendizaje.php" );
      })
      </script>

      <script type="text/javascript">
      $("document").ready(function (){
        $( "#cod_result" ).load( "../tablas/tabla_result_aprendizaje.php" );
      })
      </script>

      <script type="text/javascript">
      $("document").ready(function (){
        $( "#cod_ambiente" ).load( "../tablas/tabla_ambiente.php" );
      })
      </script>

      <script type="text/javascript">
      $("document").ready(function (){
        $( "#cod_dia" ).load( "../tablas/tabla_dia.php" );
      })
      </script>

      <script type="text/javascript">
      $("document").ready(function (){
        $( "#cod_duracion" ).load( "../tablas/tabla_dura_competencia.php" );
      })
      </script>
      <title> Crear Horario </title>  

      <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/business-casual.css" rel="stylesheet">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic" rel="stylesheet" type="text/css">

    


    </head>
    
    <body>
      <div class="container">
        <div class="row">
        <h3>Cronograma</h3>
        <div class="panel panel-default">
        <div class="panel-body">
        <a href="../../ver.php" class="btn btn-success">Regresar</a>
          <h2 align="center"> <font color="#22ad4e"></font></h2>
        </div>
        
        <form class="form-horizontal" method="POST" action="../guardar/horario.php" autocomplete="off">

        <!--crear row para insertar una colomna-->
        <div class="row">
        <!--la class col md + # sirve para poner el espacio de columnas que quieres (recuerde: no se puede pasar de 12 columnas) -->
          
        <div class="col-md-3">
            <div class="form-group">
            <label for="cod_ficha" class="col-sm-3 control-label">Cronograma</label>
            <div class="col-sm-10">
               <input type="number" class="form-control" id="cod_detalles" name="cod_detalles" placeholder="Codigo">
            </div>
          </div>
          </div>


          <div class="col-md-3">
            <div class="form-group">
            <label for="cod_ficha" class="col-sm-3 control-label">Ficha</label>
            <div class="col-sm-10">
              <select class="form-control" id="cod_ficha" name="cod_ficha" placeholder="Ficha">
              </select>
            </div>
          </div>
          </div>

          <div class="col-md-3">
          <div class="form-group">
            <label for="cod_trimestre" class="col-sm-3 control-label">Trimestre</label>
            <div class="col-sm-10">
              <select class="form-control" id="cod_trimestre" name="cod_trimestre" placeholder="Trimestre">
                
              </select>
            </div>
          </div>
          </div>

          <div class="col-md-3">
            
          <div class="form-group">
            <label for="cod_temp" class="col-sm-3 control-label">A&ntildeo</label>
            <div class="col-sm-10">
              <select class="form-control" id="cod_temp" name="cod_temp" placeholder="Año">
                
              </select>
            </div>
          </div>
          </div>

          <!--DIV ROW FINAL-->
        </div>  
          

          <div class="row">

          <div class="col-md-10">
          <div class="form-group">
            <label for="cod_programa" class="col-sm-6 control-label">Programa</label>
            <div class="col-sm-10">
              <select class="form-control" id="cod_programa" name="cod_programa" placeholder="Programa">
    
              </select>
            </div>
          </div>
          </div>

          <div class="col-md-2">
          <div class="form-group">
            <label for="cod_jornada" class="col-sm-6 control-label">Jornada</label>
            <div class="col-sm-10">
              <select class="form-control" id="cod_jornada" name="cod_jornada" placeholder="Jornada">
                
              </select>
            </div>
          </div>
          </div>

          </div>


          <div class="row">

          <div class="col-md-10">
          <div class="form-group">
            <label for="cod_compe" class="col-sm-6 control-label">Competencia</label>
            <div class="col-sm-10">
              <select class="form-control" id="cod_compe" name="cod_compe" placeholder="Competencia">
                
              </select>
            </div>
          </div>
          </div> 

          <div class="col-md-2">
          <div class="form-group">
            <label for="cod_fase" class="col-sm-6 control-label">Fase</label>
            <div class="col-sm-10">
              <select class="form-control" id="cod_fase" name="cod_fase" placeholder="Fase">
                
              </select>
            </div>
          </div>
          </div>

          </div>


          <div class="row">

          <div class="col-md-12">
          <div class="form-group">
            <label for="cod_act_proyecto" class="col-sm-6 control-label">Actividad de proyecto</label>
            <div class="col-sm-10">
              <select class="form-control" id="cod_act_proyecto" name="cod_act_proyecto" placeholder="Actividad Proyecto">
                
              </select>
            </div>
            </div>
          </div>

          </div>


          <div class="row">

          <div class="col-md-12"> 
          <div class="form-group">
            <label for="cod_acti" class="col-sm-6 control-label">Actividad de aprendizaje</label>
            <div class="col-sm-10">
              <select class="form-control" id="cod_acti" name="cod_acti" placeholder="Actividad de aprendizaje">
                
              </select>
            </div>
          </div>
          </div>

          </div>

          <div class="row">

          <div class="col-md-12"> 
          <div class="form-group">
            <label for="cod_result" class="col-sm-6 control-label">Resultado de aprendizaje</label>
            <div class="col-sm-10">
              <select class="form-control" id="cod_result" name="cod_result" placeholder="Resultado de aprendizaje">
                
              </select>
            </div>
          </div>
          </div>

          </div>


          <div class="row">

          <div class="col-md-8">
          <div class="form-group">
            <label for="cod_ambiente" class="col-sm-3 control-label">Ambiente</label>
            <div class="col-sm-10">
              <select class="form-control" id="cod_ambiente" name="cod_ambiente" placeholder="Ambiente">
                
              </select>
            </div>
          </div>
          </div>

          <div class="col-md-4">
          <div class="form-group">
            <label for="cod_dia" class="col-sm-3 control-label">Dia</label>
            <div class="col-sm-10">
              <select class="form-control" id="cod_dia" name="cod_dia" placeholder="Dia">
                
              </select>
            </div>
          </div>
          </div>

          <div class="col-md-4">
          <div class="form-group">
            <label for="cod_duracion" class="col-sm-6 control-label">cod_duracion</label>
            <div class="col-sm-10">
              <select class="form-control" id="cod_duracion" name="cod_duracion" placeholder="Duracion de competencia">
                
              </select>
            </div>
          </div>
          </div>

          <div class="col-md-8">
          <div class="form-group">
            <label for="cod_instructor" class="col-sm-3 control-label">Instructor</label>
            <div class="col-sm-10">
              <select class="form-control" id="cod_instructor" name="cod_instructor" placeholder="Instructor">
                
              </select>
            </div>
          </div>
          </div>

          </div>

        
          </div>
          
          
          <div class="form-group">
            <div class="col-sm-offset-2">
              <button type="submit" class="btn btn-success">Guardar</button>
            </div>
          </div>
        </form>
      </div>

      </div>
      </div>
    </body>
  </html>