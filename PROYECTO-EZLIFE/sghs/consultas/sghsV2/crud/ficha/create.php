<?php
require("../class/ficha.php");
require("../class/programa.php");
require("../class/trimestre.php");

include "header.php";
?>
<a href="ver.php" class="btn btn-success btn-md"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span> Regresar</a>
<?php
if(isset($_POST['bts'])){
	if($_POST['ficha']!=null && $_POST['fechaInicio']!=null && $_POST['fechaFin']!=null && $_POST['programa']!=null && $_POST['trimestre']!=null){
		$paginas = new Ficha();
		$paginas->add();
		?>
		<p></p>
		<div class="alert alert-success alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
			<strong>Listo!</strong> Registro guardado con exito... ¿Quieres ver los ambientes?<a href="ver.php">Ver ambientes</a>.
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
				<label for="ficha">ficha</label>
				<input type="text" class="form-control" name="ficha" id="ficha" placeholder="">
			</div>

			<div class="form-group">
				<label for="fechaInicio">Fecha Inicio</label>
				<input type="date" class="form-control" name="fechaInicio" id="fechaInicio" placeholder="">
			</div>

			<div class="form-group">
				<label for="fechaFin">fecha Fin</label>
				<input type="date" class="form-control" name="fechaFin" id="fechaFin" placeholder="">
			</div>

			<div class="form-group">
				<label for="programa">Programa</label>
				<select class="form-control" name="programa">
				<option value="0">Seleccione</option>
					<?php
					$objJornada = new Programa();
					$jornadas = $objJornada->programa();
					foreach ($jornadas as $jornada) {
						?>
						<option value="
						<?php echo $jornada["cod_programa"]; ?>">
						<?php echo $jornada["nom_programa"]; ?>
						</option>
						<?php
					}
					?>
				</select>
			</div>

			<div class="form-group">
				<label for="trimestre">Trimestre</label>
				<select class="form-control" name="trimestre">
				<option value="0">Seleccione</option>
					<?php
					$objJornada = new Trimestre();
					$jornadas = $objJornada->trimestre();
					foreach ($jornadas as $jornada) {
						?>
						<option value="
						<?php echo $jornada["cod_trimestre"]; ?>">
						<?php echo $jornada["nom_trimestre"]; ?>
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