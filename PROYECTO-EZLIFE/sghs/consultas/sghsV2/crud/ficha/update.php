<?php
require("../class/ficha.php");
require("../class/programa.php");
require("../class/trimestre.php");
include "header.php";
if(isset($_GET['u'])){
	if(isset($_POST['bts'])){
		$per = new Ficha();
		$per->update();
	}


	$obj = new Ficha();
	$ficha = $obj->fichaPorId($_GET["u"]);
	?>
	<a href="ver.php" class="btn btn-success btn-md"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span> Regresar</a>
	<p><br/></p>
	<div class="panel panel-default">
		<div class="panel-body">

			<form role="form" method="post">
				<input type="hidden" value="<?php echo $ficha[0]['cod_ficha']; ?>" name="cod_ficha"/>
				<div class="form-group">
					<label for="ficha">ficha</label>
					<input type="text" class="form-control" name="ficha" id="ficha" value="<?php echo $ficha[0]['cod_ficha']; ?>">
				</div>
				<div class="form-group">
					<label for="fechaInicio">Fecha Inicio</label>
					<input type="date" class="form-control" name="fechaInicio" id="fechaInicio" value="<?php echo $ficha[0]['fec_inicio']; ?>">
				</div>
				
				<div class="form-group">
					<label for="fechaFin">Fecha Fin</label>
					<input type="date" class="form-control" name="fechaFin" id="fechaFin" value="<?php echo $ficha[0]['fec_fin']; ?>">
				</div>
				
				<div class="form-group">
				<label for="programa">Programa</label>
				<select class="form-control" name="programa">
					<option value="0">seleccionar</option>
					<?php
					$objC = new Programa();
					$cargos = $objC->programa();
					foreach ($cargos as $cargo) {
						if($ficha[0]["cod_programa"] == $cargo["cod_programa"]){
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
				
			<div class="form-group">
					<label for="trimestre">Trimestre</label>
						<select class="form-control" name="trimestre">
					<option value="0">seleccionar</option>
					<?php
					$objC = new Trimestre();
					$cargos = $objC->trimestre();
					foreach ($cargos as $cargo) {
						if($ficha[0]["cod_trimestre"] == $cargo["cod_trimestre"]){
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
				


				<button type="submit" name="bts" class="btn btn-default">Actualizar</button>
			</form>
			<?php
		}
		include "footer.php";
		?>
