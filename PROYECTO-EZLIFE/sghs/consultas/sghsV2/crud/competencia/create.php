<?php
require("../class/competencia.php");
require("../class/rel_resultado.php");
require("../class/rel_fase.php");
require("../class/rel_actividad.php");
include "header.php";
?>
<a href="../index.php" class="btn btn-success btn-md"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span> Regresar</a>
<?php
if(isset($_POST['bts'])){
	if($_POST['codigo']!=null && $_POST['nombre']!=null && $_POST['resultado']!=null && $_POST['fase']!=null && $_POST['actividad']!=null){
		$paginas = new Competencia();
		$paginas->add();
		?>
		<p></p>
		<div class="alert alert-success alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
			<strong>Listo!</strong> Registro guardado con exito... ¿Quieres ver las competencias?<a href="ver.php">Ver Competencia</a>.
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
				<label for="codigo">Codigo Competencia</label>
				<input type="text" class="form-control" name="codigo" id="codigo" placeholder=""></input> 
			</div>
			<div class="form-group">
				<label for="nombre">Nombre Competencia</label>
				<input type="text" class="form-control" name="nombre" id="nombre" placeholder=""></input> 
			</div>
		<div class="form-group">
			<label for="resultado">Resultado</label>
				<select class="form-control" name="resultado">
				<option value="0">seleccionar</option>
					<?php
					$objPaises = new resultadoAprendizaje();
					$paises = $objPaises->resultadoaprendizaje ();
					foreach ($paises as $pais) {
						?>
						<option value="<?php echo $pais["cod_result"]; ?>"><?php echo $pais["nom_result"]; ?></option>
						<?php
					}
					?>
				</select>
			</div>
		<div class="form-group">
			<label for="fase">Fase</label>
				<select class="form-control" name="fase">
				<option value="0">seleccionar</option>
					<?php
					$objPaises = new Fase();
					$paises = $objPaises->fase();
					foreach ($paises as $pais) {
						?>
						<option value="<?php echo $pais["cod_fase"]; ?>"><?php echo $pais["nom_fase"]; ?></option>
						<?php
					}
					?>
				</select>
			</div>
		<div class="form-group">
			<label for="actividad">Actividad</label>
				<select class="form-control" name="actividad">
				<option value="0">seleccionar</option>
					<?php
					$objPaises = new ActividadAprendizaje();
					$paises = $objPaises->actividadaprendizaje();
					foreach ($paises as $pais) {
						?>
						<option value="<?php echo $pais["cod_acti"]; ?>"><?php echo $pais["nom_acti"]; ?></option>
						<?php
					}
					?>
				</select>
			</div>

			<button type="submit" name="bts" class="btn btn-default">Guardar</button>
		</form>


		<?php
		include "footer.php";
		?>