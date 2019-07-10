<footer class="row" id="contactenos">

	<hr>
	
	<h1 class="text-center text-info"><b>CONTÁCTENOS</b></h1>

	<hr>
	
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">


	<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3976.874244084864!2d-74.09388748576794!3d4.616513243668524!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e3f996f9cf404c9%3A0x819dfcf53c92d9e9!2sSENA+Centro+de+Gesti%C3%B3n+Industrial!5e0!3m2!1ses-419!2s!4v1497551038646" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>


		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 jumbotron">

    		<h4 class="blockquote-reverse text-primary">
    			<ul>
	              <li><span class="glyphicon glyphicon-phone"></span>Numero telefonico</li>
	              <li><span class="glyphicon glyphicon-map-marker"></span>  Calle 15 No. 31-42</li>
	              <li><span class="glyphicon glyphicon-envelope"></span>SENA Distrito Capital Centro de Diseño y Metrología</li>    
	          	</ul>      
    		</h4>

			</div>

	</div>

	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" id="formulario" >

		<ol>
    		<li>
        		<a href="https://www.facebook.com/www.senasofiaplus.edu.co/" target="_blank">
          		<i class="fa fa-facebook" style="font-size:24px;"></i>  
       		 	</a>
   			</li>

    		<li>
        		<a href="https://www.youtube.com/user/SENATV" target="_blank">  
          		<i class="fa fa-youtube" style="font-size:24px;"></i>  
       			</a>
    		</li>
    
    		<li>
        		<a href="http://oferta.senasofiaplus.edu.co/sofia-oferta/" target="_blank">
          		<i class="fa fa-book" style="font-size:24px;"></i>  
        		</a>
    		</li>
			</ol>

			<form method="post" onsubmit="return validarMensaje()">

			    <input type="text" class="form-control" id="nombre" name="nombre"  placeholder="Nombre" required>

			    <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>

			    <textarea name="mensaje" id="mensaje" cols="30" rows="10" placeholder="Contenido del Mensaje" class="form-control" required></textarea>

			 
			  	<input type="submit" class="btn btn-default" value="Enviar">
		</form>

		<?php

		$mensajes = new MensajesController();
		$mensajes -> registroMensajesController();

		?>
				
	</div>

</footer>
