<?php
require("../class/ambiente.php");
require("../class/rel_sedes.php");
include "header.php";
if(isset($_GET['u'])){
	if(isset($_POST['bts'])){
		$per = new Ambiente();
		$per->update();
	}


	$obj = new Ambiente();
	$ambiente = $obj->ambientePorId($_GET["u"]);
	?>
	<a href="ver.php" class="btn btn-success btn-md"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span> Regresar</a>
	<p><br/></p>
	<div class="panel panel-default">
		<div class="panel-body">

			<form role="form" method="post">
				<input type="hidden" value="<?php echo $ambiente[0]['cod_ambiente']; ?>" name="id_ambiente"/>



				<div class="form-group">
					<label for="codigo">Codigo Ambiente</label>
					<input type="text" class="form-control" name="codigo" id="codigo" value="<?php echo $ambiente[0]['cod_ambiente']; ?>">
				</div>

				<div class="form-group">
					<label for="nombre">Nombre Ambiente</label>
					<input type="text" class="form-control" name="nombre" id="nombre" value="<?php echo $ambiente[0]['nom_ambiente']; ?>">
				</div>
			<div class="form-group">
			<label for="sede">Sede</label>
				<select class="form-control" name="sede">
				<option value="0">seleccionar cargo</option>
					<?php
					$objC = new Sede();
					$cargos = $objC->sede();
					foreach ($cargos as $cargo) {
						if($ambiente[0]["cod_sede"] == $cargo["cod_sede"]){
								?>
						<option value="<?php echo $cargo["cod_sede"]; ?>" selected="selected"><?php echo $cargo["nom_sede"]; ?></option>
						<?php
							}else{
								?>
						<option value="<?php echo $cargo["cod_sede"]; ?>"><?php echo $cargo["nom_sede"]; ?></option>
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
