<?php
require("../class/instructor.php");
require("../class/rel_ficha.php");
require("../class/rel_tipo.php");
include "header.php";
?>
<a href="ver.php" class="btn btn-success btn-md"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span> Regresar</a>
<?php
if(isset($_POST['bts'])){
	if($_POST['nombre']!=null && $_POST['apellido']!=null && $_POST['perfil']!=null && $_POST['ficha']!=null && $_POST['tipo']!=null){
		$paginas = new Instructor();
		$paginas->add();
		?>
		<p></p>
		<div class="alert alert-success alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
			<strong>Listo!</strong> Registro guardado con exito... ¿Quieres ver los instructores?<a href="ver.php">Ver Instructores</a>.
		</div>
		<?php

	} else{
		?>
		<p></p>
		<div class="alert alert-warning alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
			<strong>Error!</strong> Formulario vacio.
		</div>
		<?php
	}
}
?>

<p><br/></p>
<div class="panel panel-default">
	<div class="panel-body">

		<form role="form" method="post">
			<div class="form-group">
				<label for="nombre">Nombre Instructor</label>
				<input type="text" class="form-control" name="nombre" id="nombre" placeholder="">
			</div>
			<div class="form-group">
				<label for="apellido">Apellido Instructor</label>
				<input type="text" class="form-control" name="apellido" id="apellido" placeholder="">
			</div>
			<div class="form-group">
				<label for="perfil">Perfil Instructor</label>
				<input type="text" class="form-control" name="perfil" id="perfil" placeholder="">
			</div>
			<div class="form-group">
				<label for="ficha">Ficha</label>
				<select class="form-control" name="ficha">
				<option value="0">Seleccione</option>
					<?php
					$objJornada = new Ficha();
					$jornadas = $objJornada->ficha();
					foreach ($jornadas as $jornada) {
						?>
						<option value="
						<?php echo $jornada["cod_ficha"]; ?>">
						<?php echo $jornada["cod_ficha"]; ?>
						</option>
						<?php
					}
					?>
				</select>
			</div>

			<div class="form-group">
				<label for="tipo">Tipo de rol</label>
				<select class="form-control" name="tipo">
				<option value="0">Seleccione</option>
					<?php
					$objJornada = new Tiporol();
					$jornadas = $objJornada->tiporol();
					foreach ($jornadas as $jornada) {
						?>
						<option value="
						<?php echo $jornada["id"]; ?>">
						<?php echo $jornada["tipo"]; ?>
						</option>
						<?php
					}
					?>
				</select>
			</div>

			<button type="submit" name="bts" class="btn btn-default">Guardar</button>
		</form>


		<?php
		include "footer.php";
		?>