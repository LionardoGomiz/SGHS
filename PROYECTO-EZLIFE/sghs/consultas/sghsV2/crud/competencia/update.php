<?php
require("../class/competencia.php");
require("../class/rel_resultado.php");
require("../class/rel_fase.php");
require("../class/rel_actividad.php");
include "header.php";
if(isset($_GET['u'])){
	if(isset($_POST['bts'])){
		$per = new Competencia();
		$per->update();
	}


	$obj = new Competencia();
	$competencia = $obj->competenciaPorId($_GET["u"]);
	?>
	<a href="ver.php" class="btn btn-success btn-md"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span> Regresar</a>
	<p><br/></p>
	<div class="panel panel-default">
		<div class="panel-body">

			<form role="form" method="post">
				<input type="hidden" value="<?php echo $competencia[0]['cod_compe']; ?>" name="cod_compe"/>



				<div class="form-group">
					<label for="codigo">Codigo Competencia</label>
					<input type="text" class="form-control" name="codigo" id="codigo" value="<?php echo $competencia[0]['cod_compe']; ?>">
				</div>

				<div class="form-group">
					<label for="nombre">Nombre Competencia</label>
					<input type="text" class="form-control" name="nombre" id="nombre" value="<?php echo $competencia[0]['nom_compe']; ?>">
				</div>


				<button type="submit" name="bts" class="btn btn-default">Actualizar</button>
			</form>
			<?php
		}
		include "footer.php";
		?>
