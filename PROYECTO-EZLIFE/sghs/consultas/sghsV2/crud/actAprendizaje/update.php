<?php
require("../class/actAprendizaje.php");
include "header.php";
if(isset($_GET['u'])){
	if(isset($_POST['bts'])){
		$per = new Actaprendizaje();
		$per->update();
	}


	$obj = new Actaprendizaje();
	$actAprendizaje = $obj->ActaprendizajePorId($_GET["u"]);
	?>
	<a href="ver.php" class="btn btn-success btn-md"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span> Regresar</a>
	<p><br/></p>
	<div class="panel panel-default">
		<div class="panel-body">

			<form role="form" method="post">
				<input type="hidden" value="<?php echo $actAprendizaje[0]['cod_acti']; ?>" name="id_aprendizaje"/>

				<div class="form-group">
					<label for="aa">Actividad de aprendizaje</label>
					<input type="text" class="form-control" name="aa" id="aa" value="<?php echo $actAprendizaje[0]['nom_acti']; ?>">
				</div>

				<button type="submit" name="bts" class="btn btn-default">Actualizar</button>
			</form>
			<?php
		}
		include "footer.php";
		?>
