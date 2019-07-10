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
if(isset($_GET['u'])){
	if(isset($_POST['bts'])){
		$per = new Cronograma();
		$per->update();
	}


	$obj = new Cronograma();
	$detalles = $obj->PorId($_GET["u"]);
	?>
	<a href="ver.php" class="btn btn-success btn-md"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span> Regresar</a>
	<p><br/></p>
	<div class="panel panel-default">
		<div class="panel-body">

	<form role="form" method="post">
		<input type="hidden" value="<?php echo $detalles[0]['cod_detalles']; ?>" name="cod_detalles"/>

		<div class="form-group col-md-4">
			<label for="ficha">Ficha</label>
				<select class="form-control" name="ficha">
				<option value="0">seleccionar</option>
					<?php
					$objC = new Ficha();
					$cargos = $objC->ficha();
					foreach ($cargos as $cargo) {
						if($detalles[0]["cod_ficha"] == $cargo["cod_ficha"]){
								?>
						<option value="<?php echo $cargo["cod_ficha"]; ?>" selected="selected"><?php echo $cargo["cod_ficha"]; ?></option>
						<?php
							}else{
								?>
						<option value="<?php echo $cargo["cod_ficha"]; ?>"><?php echo $cargo["cod_ficha"]; ?></option>
						<?php
							}

						
					}
					?>
				</select>
			</div>

		<div class="form-group col-md-4">
			<label for="trimestre">Trimestre</label>
				<select class="form-control" name="trimestre">
				<option value="0">seleccionar</option>
					<?php
					$objC = new Trimestre();
					$cargos = $objC->trimestre();
					foreach ($cargos as $cargo) {
						if($detalles[0]["cod_trimestre"] == $cargo["cod_trimestre"]){
								?>
						<option value="<?php echo $cargo["cod_trimestre"]; ?>" selected="selected"><?php echo $cargo["nom_trimestre"]; ?></option>
						<?php
							}else{
								?>
						<option value="<?php echo $cargo["cod_trimestre"]; ?>"><?php echo $cargo["nom_trimestre"]; ?></option>
						<?php
							}

						
					}
					?>
				</select>
			</div>

		<div class="form-group col-md-4">
			<label for="temporada">Año</label>
				<select class="form-control" name="temporada">
				<option value="0">seleccionar</option>
					<?php
					$objC = new Temporada();
					$cargos = $objC->temporada();
					foreach ($cargos as $cargo) {
						if($detalles[0]["cod_temp"] == $cargo["cod_temp"]){
								?>
						<option value="<?php echo $cargo["cod_temp"]; ?>" selected="selected"><?php echo $cargo["cod_temp"]; ?></option>
						<?php
							}else{
								?>
						<option value="<?php echo $cargo["cod_temp"]; ?>"><?php echo $cargo["cod_temp"]; ?></option>
						<?php
							}

						
					}
					?>
				</select>
			</div>

		<div class="form-group col-md-10">
			<label for="programa">Programa</label>
				<select class="form-control" name="programa">
				<option value="0">seleccionar</option>
					<?php
					$objC = new Programa();
					$cargos = $objC->programa();
					foreach ($cargos as $cargo) {
						if($detalles[0]["cod_programa"] == $cargo["cod_programa"]){
								?>
						<option value="<?php echo $cargo["cod_programa"]; ?>" selected="selected"><?php echo $cargo["nom_programa"]; ?></option>
						<?php
							}else{
								?>
						<option value="<?php echo $cargo["cod_programa"]; ?>"><?php echo $cargo["nom_programa"]; ?></option>
						<?php
							}

						
					}
					?>
				</select>
			</div>

		

		<div class="form-group col-md-2">
			<label for="jornada">Jornada</label>
				<select class="form-control" name="jornada">
				<option value="0">seleccionar</option>
					<?php
					$objC = new Jornada();
					$cargos = $objC->jornada();
					foreach ($cargos as $cargo) {
						if($detalles[0]["cod_jornada"] == $cargo["cod_jornada"]){
								?>
						<option value="<?php echo $cargo["cod_jornada"]; ?>" selected="selected"><?php echo $cargo["nom_jornada"]; ?></option>
						<?php
							}else{
								?>
						<option value="<?php echo $cargo["cod_jornada"]; ?>"><?php echo $cargo["nom_jornada"]; ?></option>
						<?php
							}

						
					}
					?>
				</select>
			</div>

		<div class="form-group col-md-12">
			<label for="competencia">Competencia</label>
				<select class="form-control" name="competencia">
				<option value="0">seleccionar</option>
					<?php
					$objC = new Competencia();
					$cargos = $objC->competencia();
					foreach ($cargos as $cargo) {
						if($detalles[0]["cod_compe"] == $cargo["cod_compe"]){
								?>
						<option value="<?php echo $cargo["cod_compe"]; ?>" selected="selected"><?php echo $cargo["nom_compe"]; ?></option>
						<?php
							}else{
								?>
						<option value="<?php echo $cargo["cod_compe"]; ?>"><?php echo $cargo["nom_compe"]; ?></option>
						<?php
							}

						
					}
					?>
				</select>
			</div>

		<div class="form-group col-md-3">
			<label for="fase">Fase</label>
				<select class="form-control" name="fase">
				<option value="0">seleccionar</option>
					<?php
					$objC = new Fase();
					$cargos = $objC->fase();
					foreach ($cargos as $cargo) {
						if($detalles[0]["cod_fase"] == $cargo["cod_fase"]){
								?>
						<option value="<?php echo $cargo["cod_fase"]; ?>" selected="selected"><?php echo $cargo["nom_fase"]; ?></option>
						<?php
							}else{
								?>
						<option value="<?php echo $cargo["cod_fase"]; ?>"><?php echo $cargo["nom_fase"]; ?></option>
						<?php
							}

						
					}
					?>
				</select>
			</div>

		<div class="form-group col-md-9">
			<label for="proyecto">Actividad Proyecto</label>
				<select class="form-control" name="proyecto">
				<option value="0">seleccionar</option>
					<?php
					$objC = new ActividadProyecto();
					$cargos = $objC->actividadproyecto();
					foreach ($cargos as $cargo) {
						if($detalles[0]["cod_act_proyecto"] == $cargo["cod_act_proyecto"]){
								?>
						<option value="<?php echo $cargo["cod_act_proyecto"]; ?>" selected="selected"><?php echo $cargo["nom_act_proyecto"]; ?></option>
						<?php
							}else{
								?>
						<option value="<?php echo $cargo["cod_act_proyecto"]; ?>"><?php echo $cargo["nom_act_proyecto"]; ?></option>
						<?php
							}

						
					}
					?>
				</select>
			</div>
			
		<div class="form-group col-md-12">
			<label for="actividad">Actividad Aprendizaje</label>
				<select class="form-control" name="actividad">
				<option value="0">seleccionar</option>
					<?php
					$objC = new ActividadAprendizaje();
					$cargos = $objC->actividadaprendizaje();
					foreach ($cargos as $cargo) {
						if($detalles[0]["cod_acti"] == $cargo["cod_acti"]){
								?>
						<option value="<?php echo $cargo["cod_acti"]; ?>" selected="selected"><?php echo $cargo["nom_acti"]; ?></option>
						<?php
							}else{
								?>
						<option value="<?php echo $cargo["cod_acti"]; ?>"><?php echo $cargo["nom_acti"]; ?></option>
						<?php
							}

						
					}
					?>
				</select>
			</div>

		<div class="form-group col-md-12">
			<label for="resultado">Resultado Aprendizaje</label>
				<select class="form-control" name="resultado">
				<option value="0">seleccionar</option>
					<?php
					$objC = new ResultadoAprendizaje();
					$cargos = $objC->resultadoaprendizaje();
					foreach ($cargos as $cargo) {
						if($detalles[0]["cod_result"] == $cargo["cod_result"]){
								?>
						<option value="<?php echo $cargo["cod_result"]; ?>" selected="selected"><?php echo $cargo["nom_result"]; ?></option>
						<?php
							}else{
								?>
						<option value="<?php echo $cargo["cod_result"]; ?>"><?php echo $cargo["nom_result"]; ?></option>
						<?php
							}

						
					}
					?>
				</select>
			</div>


		<div class="form-group col-md-3">
			<label for="ambiente">Ambiente</label>
				<select class="form-control" name="ambiente">
				<option value="0">seleccionar</option>
					<?php
					$objC = new Ambiente();
					$cargos = $objC->ambiente();
					foreach ($cargos as $cargo) {
						if($detalles[0]["cod_ambiente"] == $cargo["cod_ambiente"]){
								?>
						<option value="<?php echo $cargo["cod_ambiente"]; ?>" selected="selected"><?php echo $cargo["nom_ambiente"]; ?></option>
						<?php
							}else{
								?>
						<option value="<?php echo $cargo["cod_ambiente"]; ?>"><?php echo $cargo["nom_ambiente"]; ?></option>
						<?php
							}

						
					}
					?>
				</select>
			</div>
		<div class="form-group col-md-2">
			<label for="dia">Día</label>
				<select class="form-control" name="dia">
				<option value="0">seleccionar</option>
					<?php
					$objC = new Dia();
					$cargos = $objC->dia();
					foreach ($cargos as $cargo) {
						if($detalles[0]["cod_dia"] == $cargo["cod_dia"]){
								?>
						<option value="<?php echo $cargo["cod_dia"]; ?>" selected="selected"><?php echo $cargo["nom_dia"]; ?></option>
						<?php
							}else{
								?>
						<option value="<?php echo $cargo["cod_dia"]; ?>"><?php echo $cargo["nom_dia"]; ?></option>
						<?php
							}

						
					}
					?>
				</select>
			</div>

		<div class="form-group col-md-3">
			<label for="duracion">Duracion</label>
				<select class="form-control" name="duracion">
				<option value="0">seleccionar</option>
					<?php
					$objC = new Duracion();
					$cargos = $objC->duracion();
					foreach ($cargos as $cargo) {
						if($detalles[0]["cod_duracion"] == $cargo["cod_duracion"]){
								?>
						<option value="<?php echo $cargo["cod_duracion"]; ?>" selected="selected"><?php echo $cargo["hora_inicio"] . ' - ' . $cargo["hora_fin"]; ?></option>
						<?php
							}else{
								?>
						<option value="<?php echo $cargo["cod_duracion"]; ?>"><?php echo $cargo["hora_fin"] . ' - ' . $cargo["hora_fin"]; ?></option>
						<?php
							}

						
					}
					?>
				</select>
			</div>

		<div class="form-group col-md-4">
			<label for="instructor">Instructor</label>
				<select class="form-control" name="instructor">
				<option value="0">seleccionar</option>
					<?php
					$objC = new Instructor();
					$cargos = $objC->instructor();
					foreach ($cargos as $cargo) {
						if($detalles[0]["cod_instructor"] == $cargo["cod_instructor"]){
								?>
						<option value="<?php echo $cargo["cod_instructor"]; ?>" selected="selected"><?php echo $cargo["nom_instructor"] . ' - ' . $cargo["ape_instructor"]; ?></option>
						<?php
							}else{
								?>
						<option value="<?php echo $cargo["cod_instructor"]; ?>"><?php echo $cargo["nom_instructor"] . ' - ' . $cargo["ape_instructor"]; ?></option>
						<?php
							}

						
					}
					?>
				</select>
			</div>
			<button type="submit" name="bts" class="btn btn-default">Guardar</button>
		</form>
			<?php
		}
		include "footer.php";
		?>
