<?php 
	require_once('../lib/mpdf60/mpdf.php');
	$conn = new mysqli('localhost', 'root', '', 'sghv_v1');
	$query = "SELECT , instructor, competencia, resultado_aprendizaje, ficha, hora, cantidad_hora FROM detalles";
	$prepare = $conn->prepare($query);
	$prepare->execute();
	$resultSet = $prepare->get_result();
	while($ambientes[] = $resultSet->fetch_array());
	$resultSet->Close();
	$prepare->Close();
	$conn->Close();

	$html = '<header>
				<div>
				<img src="img/logo.png">
				<h3>HORARIO POR AMBIENTES</h3>
				</div>
				</header>
				<main>
					<table>
						<thead>
							<tr>
								<th>Dia</th>
								<th>Instructor</th>
								<th>Competencia</th>
								<th>Resultado de aprendizaje</th>
								<th>Ficha</th>
								<th>Hora</th>
								<th>Cant. Horas</th>
							</tr>
						</thead>';

						foreach ($ambientes as $ambiente) {

							$html .= '<tr>
				            <td class="dia">' .$ambiente['dia']. '</td>
				            <td class="instructor">' .$ambiente['instructor']. '</td>
				            <td class="competencia">' .$ambiente['competencia']. '</td>
				            <td class="resultado">' .$ambiente['resultado_aprendizaje']. '</td>
				            <td class="ficha">' .$ambiente['ficha']. '</td>
				            <td class="hora">' .$ambiente['hora']. '</td>
				            <td class="cantidad">' .$ambiente['cantidad_hora']. '</td>
				           
				          	</tr>';
							
						}

						$html .='



					</table>
				</main>';



	$mpdf = new mPDF('utf-8', 'A4-l');
	$mpdf->allow_charset_conversion=true;  // Set by default to TRUE, 3 horas de mi vida buscando el problema de convercion a utf-8 dat yo mismo.
	$mpdf->charset_in='windows-1252';// lo cambio , fue dificil pero encontre la solucion en la deep web Ty Hacker19239
	$css = file_get_contents('css/styles_ambientes.css');
	$mpdf->writeHTML($css, 1);
	$mpdf->writeHTML($html);
	$mpdf->Output('reporte.pdf', 'I');



 ?>