<!--=====================================
COLUMNA BOTONERA           
======================================-->

	<div class="col-lg-2 col-md-2 col-sm-3 col-xs-12" id="col1">
		
		<div id="logo" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				
			<img src="views/images/logotipo.png" class="img-responsive" alt="Image">


		</div>

		<!--=====================================
		BOTONERA MOVIL            
		======================================-->

		<div id="botoneraMovil" class="navbar-header navbar-inverse">

			<button type="button" class="navbar-toggle pull-left" data-toggle="collapse" data-target="#botonera">

				<span class="icon-bar"></span>
        		<span class="icon-bar"></span>
       			<span class="icon-bar"></span>

			</button>
		
		</div>

		<!--====  Fin de BOTONERA MOVIL  ====-->

		<nav id="botonera" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 collapse navbar-collapse text-center">
					
			<ul class="nav navbar">

				<li><a href="inicio">Inicio <span class="glyphicon glyphicon-new-window"></span></a></li>
				
				
				<?php 

	  			if($_SESSION["rol"] == 0){
				
				echo '<li><a href="suscriptores">Suscriptores <span class="glyphicon glyphicon-new-window"></span></a></li>';

				}


	  			if($_SESSION["rol"] == 0){
				
				echo '<li><a href="slide">Slide <span class="glyphicon glyphicon-new-window"></span></a></li>';

				}
				if($_SESSION["rol"] == 0){
				
				echo '<li><a href="articulos">Artículos <span class="glyphicon glyphicon-new-window"></span></a></li>';

				}

				if($_SESSION["rol"] == 0){
				
				echo '<li><a href="galeria">Imágenes <span class="glyphicon glyphicon-new-window"></span></a></li>';

				}
				if($_SESSION["rol"] == 0){
				
				echo '<li><a href="videos">Videos <span class="glyphicon glyphicon-new-window"></span></a></li>';

				}

				?>
			<a href="../index.php" target="_blank"><button type="button" class="btn btn-primary">Ver sitio</button></a>
					

			</ul>

			<a href="../consultas/crud/crud_lider/ver.php" target="_blank"><button type="button" class="btn btn-info">Creación Cronograma</button></a>


<br>
<br>

			<?php 


			if($_SESSION["rol"] == 0){
				
				echo '<a href="../consultas/sghsV2/index.php" target="_blank"><button type="button" class="btn btn-success">Detalles Cronograma</button></a>';

				}
			 ?>



		</nav>


			
		
	

	</div>

<!--====  FIn de COLUMNA BOTONERA  ====-->