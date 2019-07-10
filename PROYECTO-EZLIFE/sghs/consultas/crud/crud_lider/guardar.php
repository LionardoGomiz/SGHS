<?php
/*
session_start();
require 'conexion.php';
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

<?php
	
	require 'conexion.php';

	$cod_detalles = $_POST['cod_detalles'];
	$cod_ficha = $_POST['ficha'];
	$cod_trimestre = $_POST['trimestre'];
	$cod_temp = $_POST['temporada'];
	$cod_programa = $_POST['programa'];
	$cod_jornada = $_POST['jornada'];
	$cod_compe = $_POST['competencia'];
	$cod_fase = $_POST['fase'];
	$cod_act_proyecto = $_POST['proyecto'];
	$cod_acti = $_POST['actividad'];
	$cod_result = $_POST['resultado'];
	$cod_ambiente = $_POST['ambiente'];
	$cod_dia = $_POST['dia'];
	$cod_duracion = $_POST['duracion'];
	$cod_instructor = $_POST['instructor'];

	$codigo = $mysqli->query ("select cod_detalles from detalles where cod_detalles = '$cod_detalles'");
	if(mysqli_num_rows($codigo)<>0)  {
		
		echo "

	<link href='../../img/logo.png' rel='icon' type='image/x-icon'/>
    <meta charset= utf-8>
    <meta http-equiv=X-UA-Compatible content=IE=edge>
    <meta name=viewport content=width=device-width, initial-scale=1>
    <meta name=description content>
    <meta name=author content>

    <title>Cronograma de actividad</title>

    <!-- Bootstrap Core CSS -->
    <link href= ../css/bootstrap.min.css rel=stylesheet>
    <link rel=stylesheet href=css/style.css/>
    <!-- Custom CSS -->
    <link href=../css/business-casual.css rel=stylesheet>

    <!-- Fonts -->
    <link href=https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800 rel=stylesheet type=text/css>
    <link href=https://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic rel=stylesheet type=text/css>
    <script language=javascript src=../js/jquery.jsa></script>

    <center>
    <br><br><br><br><br><br><br> 
	<p class=brand> <font color=#29c65b> El código del cronograma de actividades ya está registrado </font></p> 
	<p class='avisos'><a href='javascript:history.go(-1)' class='clase1'>Volver atrás</a></p> 
	"; 
	}
	else {

	$hora= $mysqli->query("select * from detalles where detalles.cod_duracion='$cod_duracion' and detalles.cod_dia = '$cod_dia' and detalles.cod_ambiente = '$cod_ambiente'");
	if(mysqli_num_rows($hora)<>0) 
{ 
echo "

	<link href='../../img/logo.png' rel='icon' type='image/x-icon'/>
    <meta charset= utf-8>
    <meta http-equiv=X-UA-Compatible content=IE=edge>
    <meta name=viewport content=width=device-width, initial-scale=1>
    <meta name=description content>
    <meta name=author content>

    <title>Cronograma de actividad</title>

    <!-- Bootstrap Core CSS -->
    <link href= ../css/bootstrap.min.css rel=stylesheet>
    <link rel=stylesheet href=css/style.css/>
    <!-- Custom CSS -->
    <link href=../css/business-casual.css rel=stylesheet>

    <!-- Fonts -->
    <link href=https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800 rel=stylesheet type=text/css>
    <link href=https://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic rel=stylesheet type=text/css>
    <script language=javascript src=../js/jquery.jsa></script>

    <center>
    <br><br><br><br><br><br><br> 
	<p class=brand> <font color=#29c65b> El ambiente ya esta vinculado con el día y la hora </font></p> 
	<p class='avisos'><a href='javascript:history.go(-1)' class='clase1'>Volver atrás</a></p> 
	"; 
} 

else{

$hora= $mysqli->query("select * from detalles where detalles.cod_duracion='$cod_duracion' and detalles.cod_dia = '$cod_dia' and detalles.cod_instructor = '$cod_instructor' ");
	if(mysqli_num_rows($hora)<>0) 
{ 
echo "

	<link href='../../img/logo.png' rel='icon' type='image/x-icon'/>
    <meta charset= utf-8>
    <meta http-equiv=X-UA-Compatible content=IE=edge>
    <meta name=viewport content=width=device-width, initial-scale=1>
    <meta name=description content>
    <meta name=author content>

    <title>Cronograma de actividad</title>

    <!-- Bootstrap Core CSS -->
    <link href= ../css/bootstrap.min.css rel=stylesheet>
    <link rel=stylesheet href=css/style.css/>
    <!-- Custom CSS -->
    <link href=../css/business-casual.css rel=stylesheet>

    <!-- Fonts -->
    <link href=https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800 rel=stylesheet type=text/css>
    <link href=https://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic rel=stylesheet type=text/css>
    <script language=javascript src=../js/jquery.jsa></script>

    <center>
    <br><br><br><br><br><br><br> 
	<p class=brand> <font color=#29c65b> El instructor ya esta vinculado con el día y la hora </font></p> 
	<p class='avisos'><a href='javascript:history.go(-1)' class='clase1'>Volver atrás</a></p> 
	"; 
} 

else{

	
	
	$sql = "INSERT INTO detalles (cod_detalles, cod_ficha, cod_trimestre, cod_temp, cod_programa, cod_jornada, cod_compe, cod_fase, cod_act_proyecto, cod_acti, cod_result, cod_ambiente, cod_dia, cod_duracion, cod_instructor) 
	VALUES ('$cod_detalles', '$cod_ficha', '$cod_trimestre', '$cod_temp', '$cod_programa', '$cod_jornada', '$cod_compe', '$cod_fase', '$cod_act_proyecto', '$cod_acti', '$cod_result', '$cod_ambiente', '$cod_dia', '$cod_duracion', '$cod_instructor')";
	$resultado = $mysqli->query($sql);

	
?>

 
<html lang="es">
	<head>
		<link href='../../img/logo.png' rel='icon' type='image/x-icon'/>
			<meta name="viewport" content="width=device-width, initial-scale=1">
			 <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/business-casual.css" rel="stylesheet">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic" rel="stylesheet" type="text/css">

			<script src="../js/jquery-3.1.1.min.js"></script>
			<script src="../js/bootstrap.min.js"></script>
		<title> Agregar horario </title>	
	</head>
	
	<body>
		<div class="container">
			<div class="row">
				<div class="row" style="text-align:center">
				</br></br></br></br></br></br></br></br></br></br></br>
					<?php if($resultado) { ?>
								<h3 class="brand"> <font color="#29c65b"> CRONOGRAMA DE ACTIVIDAD GUARDADO </font></h3>
								<?php } else { ?>
								<h3 class="brand"> <font color="#29c65b"> ERROR AL GUARDAR </font></h3>
							<?php } ?>
							<?php } ?>
							<?php } ?>
							<?php } ?>

					
					<a href="../horario.php" class="btn btn-primary">Regresar</a>
					
				</div>
			</div>
		</div>
	</body>
</html>