<?php
require("../class/resultadoAprendizaje.php");
include "header.php";
?>
<a href="../index.php" class="btn btn-success btn-md"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span> Regresar</a>
<?php
if(isset($_POST['bts'])){
	if($_POST['ra']!=null){
		$paginas = new ResultadoAprendizaje();
		$paginas->add();
		?>
		<p></p>
		<div class="alert alert-success alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
			<strong>Listo!</strong> Registro guardado con exito... ¿Quieres ver los resultados de aprendizaje?<a href="ver.php">Ver Resultados de Aprendizaje</a>.
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

		<form role="form" method="post">
		<div class="form-group">
				<label for="ca">CODIGO RESULTADO DE APRENDIZAJE</label>
				<input type="text" class="form-control" name="ca" id="ca" placeholder=""></input>
			</div>
			<div class="form-group">
				<label for="ra">RESULTADO DE APRENDIZAJE</label>
				<textarea type="text" class="form-control" name="ra" id="ra" placeholder=""></textarea>
			</div>
			<button type="submit" name="bts" class="btn btn-default">Guardar</button>
		</form>


		<?php
		include "footer.php";
		?>
