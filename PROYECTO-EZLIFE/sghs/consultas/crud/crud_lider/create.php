<?php
require("../class/cronograma.php");
require("../class/rel_actividad.php");
require("../class/rel_act_proyecto.php");
require("../class/rel_ambiente.php");
require("../class/rel_competencia.php");
require("../class/rel_dia.php");
require("../class/rel_duracion.php");
require("../class/rel_fase.php");
require("../class/rel_ficha.php");
require("../class/rel_instructor.php");
require("../class/rel_jornada.php");
require("../class/rel_resultado.php");
require("../class/rel_temp.php");
require("../class/rel_trimestre.php");
require("../class/rel_programa.php");
require("../class/rel_sedes.php");
include "header.php";
?>
<a href="ver.php" class="btn btn-success btn-md"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span> Regresar</a>

<?php

if(isset($_POST['bts'])){
	if($_POST['ficha']!=null && $_POST['trimestre']!=null && $_POST['temporada']!=null && $_POST['programa']!=null && $_POST['jornada']!=null && $_POST['competencia']!=null && $_POST['fase']!=null && $_POST['proyecto']!=null && $_POST['actividad']!=null && $_POST['resultado']!=null && $_POST['ambiente']!=null && $_POST['dia']!=null && $_POST['duracion']!=null && $_POST['instructor']!=null){
		$paginas = new Cronograma();
		$paginas->add();
		?>
		<p></p>
		<div class="alert alert-success alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
			<strong>Listo!</strong> Registro guardado con exito... ¿Quieres ver los Cronograma?<a href="ver.php">Ver Cronograma</a>.
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

		<form role="form" method="POST">

			<div class="col-md-6">

			<div class="form-group">

				<label  for="ficha">Ficha</label>
				<select onchange="cambiarValoresSelects(this.id, 'programa')" class="form-control" id="ficha" name="ficha">
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

			</div>
			<div class="col-md-6">
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
			</div>
			<div class="col-md-2">
			<div class="form-group">
				<label for="temporada">Año</label>
				<select class="form-control" name="temporada">
				<option value="0">Seleccione</option>
					<?php
					$objJornada = new Temporada();
					$jornadas = $objJornada->temporada();
					foreach ($jornadas as $jornada) {
						?>
						<option value="
						<?php echo $jornada["cod_temp"]; ?>">
						<?php echo $jornada["cod_temp"]; ?>
						</option>
						<?php
					}
					?>
				</select>
			</div>
			</div>
				<div class="col-md-6">
			<div class="form-group">
				<label for="programa">Programa</label>
				<select class="form-control" id="programa" name="programa">
				<option value="0">Seleccione</option>
				</select>
			</div>
			</div>
			<div class="col-md-4">
			<div class="form-group">
				<label for="jornada">Jornada</label>
				<select class="form-control" name="jornada">
				<option value="0">Seleccione</option>
					<?php
					$objJornada = new Jornada();
					$jornadas = $objJornada->jornada();
					foreach ($jornadas as $jornada) {
						?>
						<option value="
						<?php echo $jornada["cod_jornada"]; ?>">
						<?php echo $jornada["nom_jornada"]; ?>
						</option>
						<?php
					}
					?>
				</select>
			</div>
			</div>

			<div class="col-md-8">

			<div class="form-group">
				<label for="competencia">Competenecia</label>
				<select class="form-control" name="competencia">
				<option value="0">Seleccione</option>
					<?php
					$objJornada = new Competencia();
					$jornadas = $objJornada->competencia();
					foreach ($jornadas as $jornada) {
						?>
						<option value="
						<?php echo $jornada["cod_compe"]; ?>">
						<?php echo $jornada["nom_compe"]; ?>
						</option>
						<?php
					}
					?>
				</select>
			</div>
			</div>
			<div class="col-md-4">
			<div class="form-group">
				<label for="fase">Fase</label>
				<select class="form-control" name="fase">
				<option value="0">Seleccione</option>
					<?php
					$objJornada = new Fase();
					$jornadas = $objJornada->fase();
					foreach ($jornadas as $jornada) {
						?>
						<option value="
						<?php echo $jornada["cod_fase"]; ?>">
						<?php echo $jornada["nom_fase"]; ?>
						</option>
						<?php
					}
					?>
				</select>
			</div>
			</div>
			<div class="col-md-12">
			<div class="form-group">
				<label for="proyecto">Actividad Proyecto</label>
				<select class="form-control" name="proyecto">
				<option value="0">Seleccione</option>
					<?php
					$objJornada = new actividadProyecto();
					$jornadas = $objJornada->actividadproyecto();
					foreach ($jornadas as $jornada) {
						?>
						<option value="
						<?php echo $jornada["cod_act_proyecto"]; ?>">
						<?php echo $jornada["nom_act_proyecto"]; ?>
						</option>
						<?php
					}
					?>
				</select>
			</div>
			</div>
			<div class="col-md-12">
			<div class="form-group">
				<label for="actividad">Actividad Aprendizaje</label>
				<select class="form-control" name="actividad">
				<option value="0">Seleccione</option>
					<?php
					$objJornada = new ActividadAprendizaje();
					$jornadas = $objJornada->actividadaprendizaje();
					foreach ($jornadas as $jornada) {
						?>
						<option value="
						<?php echo $jornada["cod_acti"]; ?>">
						<?php echo $jornada["nom_acti"]; ?>
						</option>
						<?php
					}
					?>
				</select>
			</div>
			</div>

			<div class="col-md-12">
			<div class="form-group">
				<label for="resultado">Resultado Actividad</label>
				<select class="form-control" name="resultado">
				<option value="0">Seleccione</option>
					<?php
					$objJornada = new resultadoAprendizaje();
					$jornadas = $objJornada->resultadoaprendizaje();
					foreach ($jornadas as $jornada) {
						?>
						<option value="
						<?php echo $jornada["cod_result"]; ?>">
						<?php echo $jornada["nom_result"]; ?>
						</option>
						<?php
					}
					?>
				</select>
			</div>
			</div>

			<div class="col-md-3">
			<div class="form-group">
				<label for="ambiente">Ambiente</label>
				<select class="form-control" name="ambiente">
				<option value="0">Seleccione</option>
					<?php
					$objJornada = new Ambiente();
					$jornadas = $objJornada->ambiente();
					foreach ($jornadas as $jornada) {
						?>
						<option value="
						<?php echo $jornada["cod_ambiente"]; ?>">
						<?php echo $jornada["cod_ambiente"] . ' - ' . $jornada["nom_ambiente"] ; ?>
						</option>
						<?php
					}
					?>
				</select>
			</div>
			</div>
			<div class="col-md-2">

			<div class="form-group">
				<label for="dia">Dia</label>
				<select class="form-control" name="dia">
				<option value="0">Seleccione</option>
					<?php
					$objJornada = new Dia();
					$jornadas = $objJornada->dia();
					foreach ($jornadas as $jornada) {
						?>
						<option value="
						<?php echo $jornada["cod_dia"]; ?>">
						<?php echo $jornada["nom_dia"]; ?>
						</option>
						<?php
					}
					?>
				</select>
			</div>
			</div>
			<div class="col-md-3">
			<div class="form-group">
				<label for="duracion">Duracion</label>
				<select class="form-control" name="duracion">
				<option value="0">Seleccione</option>
					<?php
					$objJornada = new Duracion();
					$jornadas = $objJornada->duracion();
					foreach ($jornadas as $jornada) {
						?>
						<option value="
						<?php echo $jornada["cod_duracion"]; ?>">
						<?php echo $jornada["hora_inicio"] . ' - ' . $jornada['hora_fin']; ?>
						</option>
						<?php
					}
					?>
				</select>
			</div>
			</div>

			<div class="col-md-4">

			<div class="form-group">
				<label for="instructor">Instructor</label>
				<select class="form-control" name="instructor">
				<option value="0">Seleccione</option>
					<?php
					$objJornada = new Instructor();
					$jornadas = $objJornada->instructor();
					foreach ($jornadas as $jornada) {
						?>
						<option value="
						<?php echo $jornada["cod_instructor"]; ?>">
						<?php echo $jornada["nom_instructor"] . ' - ' . $jornada['ape_instructor']; ?>
						</option>
						<?php
					}
					?>
				</select>
			</div>
			</div>
			<button type="submit" name="bts" class="btn btn-default">Guardar</button>
		</form>


		<?php
		include "footer.php";
		?>