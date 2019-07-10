<?php
require("../class/actProyecto.php");
require("../class/rel_fase.php");
include "header.php";
if(isset($_GET['u'])){
	if(isset($_POST['bts'])){
		$per = new Actproyecto();
		$per->update();
	}


	$obj = new Actproyecto();
	$actproyecto = $obj->actproyectoPorId($_GET["u"]);
	?>
	<a href="ver.php" class="btn btn-success btn-md"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span> Regresar</a>
	<p><br/></p>
	<div class="panel panel-default">
		<div class="panel-body">

			<form role="form" method="post">
				<input type="hidden" value="<?php echo $actproyecto[0]['cod_act_proyecto']; ?>" name="cod_act_proyecto"/>



				<div class="form-group">
					<label for="codigo">Codigo Actividad proyecto</label>
					<input type="text" class="form-control" name="codigo" id="codigo" value="<?php echo $actproyecto[0]['cod_act_proyecto']; ?>">
				</div>
				<div class="form-group">
					<label for="actividad">Actividad de proyecto</label>
					<input type="text" class="form-control" name="actividad" id="actividad" value="<?php echo $actproyecto[0]['nom_act_proyecto']; ?>">
				</div>
				<div class="form-group">
			<label for="fase">Fase</label>
				<select class="form-control" name="fase">
				<option value="0">seleccionar fase</option>
					<?php
					$objC = new Fase();
					$cargos = $objC->fase();
					foreach ($cargos as $cargo) {
						if($actproyecto[0]["cod_fase"] == $cargo["cod_fase"]){
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

				<button type="submit" name="bts" class="btn btn-default">Actualizar</button>
			</form>
			<?php
		}
		include "footer.php";
		?>
