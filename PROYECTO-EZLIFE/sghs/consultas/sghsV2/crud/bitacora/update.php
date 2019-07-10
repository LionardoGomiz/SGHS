<?php
require("../class/instructor.php");
require("../class/rel_ficha.php");
require("../class/rel_tipo.php");
include "header.php";
if(isset($_GET['u'])){
	if(isset($_POST['bts'])){
		$per = new Instructor();
		$per->update();
	}


	$obj = new Instructor();
	$instructor = $obj->instructorPorId($_GET["u"]);
	?>
	<a href="ver.php" class="btn btn-success btn-md"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span> Regresar</a>
	<p><br/></p>
	<div class="panel panel-default">
		<div class="panel-body">

			<form role="form" method="post">
				<input type="hidden" value="<?php echo $instructor[0]['cod_instructor']; ?>" name="cod_instructor"/>
				<div class="form-group">
					<label for="nombre">Nombre Instructor</label>
					<input type="text" class="form-control" name="nombre" id="nombre" value="<?php echo $instructor[0]['nom_instructor']; ?>">
				</div>
				<div class="form-group">
					<label for="apellido">Apellido Instructor</label>
					<input type="text" class="form-control" name="apellido" id="apellido" value="<?php echo $instructor[0]['ape_instructor']; ?>">
				</div>
				<div class="form-group">
					<label for="perfil">Perfil Instructor</label>
					<input type="text" class="form-control" name="perfil" id="perfil" value="<?php echo $instructor[0]['especialidad']; ?>">
				</div>
				<button type="submit" name="bts" class="btn btn-default">Actualizar</button>
			</form>
			<?php
		}
		include "footer.php";
		?>
