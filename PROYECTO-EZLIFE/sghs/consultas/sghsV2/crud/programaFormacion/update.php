<?php
require("../class/programa.php");
include "header.php";
if(isset($_GET['u'])){
	if(isset($_POST['bts'])){
		$per = new Programa();
		$per->update();
	}


	$obj = new Programa();
	$programa = $obj->PorId($_GET["u"]);
	?>
	<a href="ver.php" class="btn btn-success btn-md"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span> Regresar</a>
	<p><br/></p>
	<div class="panel panel-default">
		<div class="panel-body">

			<form role="form" method="post">
				<input type="hidden" value="<?php echo $programa[0]['cod_programa']; ?>" name="cod_programa"/>
				<div class="form-group">
					<label for="codigo">Codigo Programa</label>
					<input type="text" class="form-control" name="codigo" id="codigo" value="<?php echo $programa[0]['cod_programa']; ?>">
				</div>
				<div class="form-group">
					<label for="nombre">Nombre Programa</label>
					<input type="text" class="form-control" name="nombre" id="nombre" value="<?php echo $programa[0]['nom_programa']; ?>">
				</div>

				<button type="submit" name="bts" class="btn btn-default">Actualizar</button>
			</form>
			<?php
		}
		include "footer.php";
		?>
