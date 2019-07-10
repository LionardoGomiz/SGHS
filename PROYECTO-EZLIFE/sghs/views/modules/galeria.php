<style type="text/css">
	.{
		background-color: red;
	}

</style>
<div class="container">
<div class="row" id="galeria">



	<hr>
	
	<h1 class="text-center text-info"><b>GALERÍA DE IMÁGENES</b></h1>

	<hr>

	<ul>

		<?php

			$galeria = new Galeria();
			$galeria -> seleccionarGaleriaController();
			
		?>

	</ul>

</div>
</div>