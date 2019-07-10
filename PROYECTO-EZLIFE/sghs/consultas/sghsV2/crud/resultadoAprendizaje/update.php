<?php
require("../class/resultadoAprendizaje.php");
include "header.php";
if(isset($_GET['u'])){
	if(isset($_POST['bts'])){
		$per = new ResultadoAprendizaje();
		$per->update();
	}


	$obj = new ResultadoAprendizaje();
	$aprendizaje = $obj->PorId($_GET["u"]);
	?>
	<a href="ver.php" class="btn btn-success btn-md"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span> Regresar</a>
	<p><br/></p>
	<div class="panel panel-default">
		<div class="panel-body">

			<form role="form" method="post">
				<input type="hidden" value="<?php echo $aprendizaje[0]['cod_result']; ?>" name="cod_result"/>

				<div class="form-group">
					<label for="ra">RESULTADO DE APRENDIZAJE</label>
					<input type="text" class="form-control" name="ra" id="ra" value="<?php echo $aprendizaje[0]['nom_result']; ?>">
				</div>
				<button type="submit" name="bts" class="btn btn-default">Actualizar</button>
			</form>
			<?php
		}
		include "footer.php";
		?>
