<?php 
	
        require_once('lib/mpdf60/mpdf.php');
	$conn = new mysqli('localhost', 'root', '', 'sghv_v1');
        
        $where = "";
        
        if(!empty($_POST))
        {
            $valor = $_POST['campo'];
            if(!empty($valor)){
                    $where = "WHERE nombre LIKE '%$valor'";
            }
        }
        
        $cod_ficha = $_GET['s_ambiente'];

        $q = "SELECT nom_fase, v1.cod_ambiente, v2.nom_dia,v3.nom_instructor,v3.especialidad, nom_act_proyecto, nom_result, nom_compe,nom_acti, ambientes.nom_ambiente, nom_programa, nom_trimestre, b2.cod_ficha,b2.fec_inicio, b2.fec_fin, y1.hora_inicio, y1.hora_fin, nom_jornada, o1.cod_temp FROM detalles 
        inner join competencia on detalles.cod_compe = competencia.cod_compe 
        inner join fases on detalles.cod_fase = fases.cod_fase
        inner join actividad_proyecto on detalles.cod_act_proyecto = actividad_proyecto.cod_act_proyecto
        inner join actividad_aprendizaje on detalles.cod_acti = actividad_aprendizaje.cod_acti
        inner join resultado_aprendizaje on detalles.cod_result = resultado_aprendizaje.cod_result
        inner join ambientes on detalles.cod_ambiente = ambientes.cod_ambiente
        inner join programa on detalles.cod_programa = programa.cod_programa  
        inner join trimestre on detalles.cod_trimestre = trimestre.cod_trimestre
        inner join jornada on detalles.cod_jornada = jornada.cod_jornada
        INNER join ambientes as v1 on v1.cod_ambiente = detalles.cod_ambiente
        inner join dia as v2 on v2.cod_dia = detalles.cod_dia
        inner JOIN instructor as v3 on v3.cod_instructor = detalles.cod_instructor
        inner join ficha as b2 on b2.cod_ficha = detalles.cod_ficha
        inner JOIN duracion as y1 on y1.cod_duracion = detalles.cod_duracion
        inner join temporada as o1 on o1.cod_temp = detalles.cod_temp


        ";
        
        if(!empty($_POST['s_anio']))
            $q .=" WHERE o1.cod_temp=".$_POST['s_anio'];
        if(!empty($_POST['s_trimes']))
            $q .=" AND trimestre.cod_trimestre=".$_POST['s_trimes'];
        if(!empty($_POST['s_ambiente']))
            $q .=" AND v1.cod_ambiente=".$_POST['s_ambiente'];
        


        $prepare = $conn->prepare($q);
	$prepare->execute();
	$resultSet = $prepare->get_result();
	while($detalles[] = $resultSet->fetch_array());
	$resultSet->Close();
	$prepare->Close();
	$conn->Close();
        $detalles1=$detalles;

		$html = '<table  border="1" style="width:20%;">
        <tr>
            <td  rowspan="4"><img src="reportes/img/logo.png" width="10%"></td>
            
            <td>CRONOGRAMA POR AMBIENTE</td>
        </tr>
        <tr>
        <td style="height:10px" style="width:500%;">F001-P002-08-11-0000</td>
        </tr>
        <tr>
            
            <td>Proceso: EJECUCION DE LA FORMACION PROFESIONAL.</td>
        </tr>
        <tr>
        	<td>Procedimiento: Desarrollo Curricular.</td>
        </tr>
        </table>';
                
        foreach ($detalles as $detalles) {
            $html .= '
                    <table  border="1">
                    <tr>

                        <td rowspan="4" style="width:10%;">Ambiente: ' .$detalles['nom_ambiente'].' - '.$detalles['cod_ambiente']. ''.$detalles['nom_sede']. '</td>
                    <tr>
                    <tr>
                            <td>Trimestre: ' .$detalles['nom_trimestre']. '</td>
                    </tr>
                    <tr>
                            <td style="width:250%;">A&ntilde;o: ' .$detalles['cod_temp']. '</td>
                    </tr>

                    <tr>

                        <td rowspan="4" style="width:60%;">Codigo del Programa: </td>
                    <tr>
                    <tr>
                            <td style="width:250%;">Programa: ' .$detalles['nom_programa']. '</td>
                    </tr>
                    </table>
    </table>			
</thead>
				';
                                                        break;
						}
$html .='<table border="1" style="bacground - color:red;" style="width:100%;">'
            .'<tr>
								<td style="width:10%;">Dia</td>
								<td>Instructor</td>
								<td>Competencia</td>
								<td>Resultado de aprendizaje</td>
								<td>Ficha</td>
                                <td>Hora inicio</td>
								<td>Hora fin</td>
								
							</tr>';
    
foreach ($detalles1 as $detalles1) {
    $html .='<tr>

				                <td class="Dia">'.$detalles1['nom_dia']. '</td>
				                <td class="Instructor">' .$detalles1['nom_instructor']. '  ' .$detalles1['ape_instructor']. ' - ' .$detalles1['especialidad']. '</td>
				                <td class="Competencia">' .$detalles1['nom_compe']. '</td>
				                <td class="Resultado de aprendizaje">' .$detalles1['nom_result']. '</td>
                                <td class="ficha">' .$detalles1['cod_ficha']. '</td>
				                <td class="Hora inicio">' .$detalles1['hora_inicio']. '</td>
				                <td class="Hora fin">' .$detalles1['hora_fin']. '</td>
				                
                                </tr>'; 
}   
$html .='</table>                                 
						

                               

					</table>
				</main>';



	$mpdf = new mPDF('utf-8', 'A4-l');
	$mpdf->allow_charset_conversion=true;  // Set by default to TRUE, 3 horas de mi vida buscando el problema de convercion a utf-8 dat yo mismo.
	$mpdf->charset_in='windows-1252';// lo cambio , fue dificil pero encontre la solucion en la deep web Ty Hacker19239
    $css = file_get_contents('css/style.css');
    $mpdf->writeHTML($css,1);
	$mpdf->writeHTML($html);
	$mpdf->Output('ambientespdf.pdf', 'I');