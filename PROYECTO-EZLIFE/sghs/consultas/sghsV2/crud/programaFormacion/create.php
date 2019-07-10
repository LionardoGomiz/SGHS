<?php
require("../class/programa.php");
require("../class/rel_tipo_programa.php");
include "header.php";
?>
<a href="../index.php" class="btn btn-success btn-md"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span> Regresar</a>
<?php
if(isset($_POST['bts'])){
	if($_POST['codigo']!=null && $_POST['nombre']!=null && $_POST['tipo']!=null){
		$paginas = new Programa();
		$paginas->add();
		?>
		<p></p>
		<div class="alert alert-success alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
			<strong>Listo!</strong> Registro guardado con exito... ¿Quieres ver los Programas Formacion ?<a href="ver.php">Ver Programas Formación</a>.
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
				<label for="codigo">Codigo Programa</label>
				<input type="text" class="form-control" name="codigo" id="codigo" placeholder=""></input> 
			</div>
			<div class="form-group">
				<label for="nombre">Nombre Programa</label>
				<input type="text" class="form-control" name="nombre" id="nombre" placeholder=""></input> 
			</div>

			<div class="form-group">
			<label for="tipo">Tipo Programa</label>
				<select class="form-control" name="tipo">
				<option value="0">Seleccionar</option>
					<?php
					$objPaises = new TipoPrograma();
					$paises = $objPaises->tipoprograma();
					foreach ($paises as $pais) {
						?>
						<option value="<?php echo $pais["cod_tipo_programa"]; ?>"><?php echo $pais["nom_tipo_programa"]; ?></option>
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