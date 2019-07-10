<?php
require("../class/ambiente.php");
require("../class/rel_sedes.php");

include "header.php";
?>
<a href="ver.php" class="btn btn-success btn-md"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span> Regresar</a>
<?php
if(isset($_POST['bts'])){
	if($_POST['codigo']!=null && $_POST['nombre']!=null && $_POST['sede']!=null){
		$paginas = new Ambiente();
		$paginas->add();
		?>
		<p></p>
		<div class="alert alert-success alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
			<strong>Listo!</strong> Registro guardado con exito... ¿Quieres ver los ambientes?<a href="ver.php">Ver ambientes</a>.
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
				<label for="codigo">Codigo Ambiente</label>
				<input type="text" class="form-control" name="codigo" id="codigo" placeholder="">
			</div>

			<div class="form-group">
				<label for="nombre">Nombre Ambiente</label>
				<input type="text" class="form-control" name="nombre" id="nombre" placeholder="">
			</div>

		<div class="form-group">
			<label for="sede">Sede</label>
				<select class="form-control" name="sede">
				<option value="0">seleccionar</option>
					<?php
					$objPaises = new Sede();
					$paises = $objPaises->sede();
					foreach ($paises as $pais) {
						?>
						<option value="<?php echo $pais["cod_sede"]; ?>"><?php echo $pais["nom_sede"]; ?></option>
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