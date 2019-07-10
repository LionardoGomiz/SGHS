<?php
require("../class/sede.php");
include "header.php";
if(isset($_GET['u'])){
	if(isset($_POST['bts'])){
		$per = new Sede();
		$per->update();
	}


	$obj = new Sede();
	$actAprendizaje = $obj->PorId($_GET["u"]);
	?>
	<a href="ver.php" class="btn btn-success btn-md"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span> Regresar</a>
	<p><br/></p>
	<div class="panel panel-default">
		<div class="panel-body">

			<form role="form" method="post">
				<input type="hidden" value="<?php echo $actAprendizaje[0]['cod_sede']; ?>" name="cod_sede"/>

				<div class="form-group">
					<label for="ns">NOMBRE SEDE</label>
					<input type="text" class="form-control" name="ns" id="ns" value="<?php echo $actAprendizaje[0]['nom_sede']; ?>">
				</div>
				
				<div class="form-group">
					<label for="dir">DIRECCIÓN</label>
					<input type="text" class="form-control" name="dir" id="dir" value="<?php echo $actAprendizaje[0]['direccion']; ?>">
				</div>
				<button type="submit" name="bts" class="btn btn-default">Actualizar</button>
			</form>
			<?php
		}
		include "footer.php";
		?>
