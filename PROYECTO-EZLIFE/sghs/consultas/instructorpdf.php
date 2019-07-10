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

        $q = "SELECT nom_fase, nom_act_proyecto, nom_result, nom_compe, j1.nom_ambiente, l1.nom_dia,  d1.nom_instructor, h1.nom_programa, j1.cod_ambiente,  nom_trimestre,f1.cod_ficha, nom_jornada, y1.cod_temp, m1.hora_inicio, m1.hora_fin, d1.cod_instructor, d1.ape_instructor, h1.cod_programa, f1.fec_inicio, f1.fec_fin FROM detalles 
        inner join competencia on detalles.cod_compe = competencia.cod_compe 
        inner join fases on detalles.cod_fase = fases.cod_fase
        inner join actividad_proyecto on detalles.cod_act_proyecto = actividad_proyecto.cod_act_proyecto
        inner join actividad_aprendizaje on detalles.cod_acti = actividad_aprendizaje.cod_acti
        inner join resultado_aprendizaje on detalles.cod_result = resultado_aprendizaje.cod_result
        inner join ambientes as j1 on detalles.cod_ambiente = j1.cod_ambiente  
        inner join trimestre on detalles.cod_trimestre = trimestre.cod_trimestre
        inner join jornada on detalles.cod_jornada = jornada.cod_jornada
        INNER join ficha as f1 on f1.cod_ficha = detalles.cod_ficha
        inner join instructor as d1 on d1.cod_instructor = detalles.cod_instructor
        inner join programa as h1 on h1.cod_programa = detalles.cod_programa
        inner join dia as l1 on l1.cod_dia = detalles.cod_dia
        inner join duracion as m1 on m1.cod_duracion = detalles.cod_duracion
        inner join temporada as y1 on y1.cod_temp = detalles.cod_temp";

        if(!empty($_POST['s_anio']))
            $q .=" WHERE y1.cod_temp=".$_POST['s_anio'];
        if(!empty($_POST['s_trimes']))
            $q .=" AND trimestre.cod_trimestre=".$_POST['s_trimes'];
        if(!empty($_POST['s_instructor']))
            $q .=" AND d1.cod_instructor=".$_POST['s_instructor'];
        
       
        $prepare = $conn->prepare($q);
	$prepare->execute();
	$resultSet = $prepare->get_result();
	while($detalles[] = $resultSet->fetch_array());
	$resultSet->Close();
	$prepare->Close();
	$conn->Close();
        $detalles1=$detalles;

		$html = '<table border="1" style="width:10%;">
        <tr>
            <td  rowspan="4"><img src="reportes/img/logo.png" width="10%"></td>
            
            <td>CRONOGRAMA DEL INSTRUCTOR</td>
        </tr>
        <tr>
        <td style="height:10px" style="width:940%;">F001-P002-08-11-9216</td>
        </tr>
        <tr>
            
            <td>Proceso: EJECUCION DE LA FORMACION PROFESIONAL.</td>
        </tr>
        <tr>
            <td>Procedimiento: Desarrollo Curricular.</td>
        </tr>
        </table>';
                
        foreach ($detalles as $detalles) {
            $html .= '<table  border="1" style="width:10%;">
        <tr>
            
            <td rowspan="4" style="width:520%;">Instructor: ' .$detalles['nom_instructor']. ' ' .$detalles['ape_instructor']. '</td>
        <tr>
        <tr>
            <td  style="height:40px" style="width:520%;">Trimestre: ' .$detalles['nom_trimestre']. '</td>
        </tr>
        <tr>
            <td style="width:520%;">A&ntilde;o: ' .$detalles['cod_temp']. '</td>
        </tr>
        </table>
        <table  border="1" style="width:10%;">
        <tr>
            
            <td rowspan="4" style="width:520%;">Codigo del Programa: ' .$detalles['cod_programa']. '</td>
            <td style="width:520%;">Programa: ' .$detalles['nom_programa']. '</td>
        <tr>
        
        </table>
    </table>			
</thead>
				';
                                                        break;
						}
$html .='<table border="1"  style="width:100%;">'
            .'<tr>
                                <td>Fase:</td>
                                <td>actividad aprendizaje:</td>
                                <td>Competencia:</td>
                                <td>Resultado de aprendizaje:</td>
                                <td>Aula-Ficha:</td>
                                <td style="width:8%;">Hora:</td>
                                <td>Fecha inicio:</td>
                                <td>Fecha fin:</td>
                                    
                            </tr>';
    
foreach ($detalles1 as $detalles1) {
    $html .='<tr>
                            <td class="Fase">' .$detalles1['nom_fase']. '</td>
                            <td class="Actividad">' .$detalles1['nom_act_proyecto']. '</td>
                            <td class="Competencia">' .$detalles1['nom_compe']. '</td>
                            <td class="Resultado de aprendizaje">' .$detalles1['nom_result']. '</td>
                            <td class="Ficha">' .$detalles1['cod_ambiente']. ' - ' .$detalles1['nom_ambiente']. ' Ficha: ' .$detalles1['cod_ficha']. '</td>
                            <td class="Hora">' .$detalles1['nom_dia']. '  ' .$detalles1['hora_inicio']. '  ' .$detalles1['hora_fin']. '</td>
                            <td class="fecha inicio">' .$detalles1['fec_inicio']. '</td>
                            <td class="fecha fin">' .$detalles1['fec_fin']. '</td>
                            
                           
                            </tr>'; 
}
$html .='</table>';                                                
						$html .='

                               

					</table>
				</main>';



	$mpdf = new mPDF('utf-8', 'A4-l');
	$mpdf->allow_charset_conversion=true;  // Set by default to TRUE, 3 horas de mi vida buscando el problema de convercion a utf-8 dat yo mismo.
	$mpdf->charset_in='windows-1252';// lo cambio , fue dificil pero encontre la solucion en la deep web Ty Hacker19239
    $css = file_get_contents('css/style.css');
    $mpdf->writeHTML($css,1);
	$mpdf->writeHTML($html);
	$mpdf->Output('instructorpdf.pdf', 'I');
    ?>