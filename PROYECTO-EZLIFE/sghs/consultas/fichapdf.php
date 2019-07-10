
<?php
    
    require_once('lib/mpdf60/mpdf.php');
    $conn = new mysqli('localhost', 'root', '', 'sghv_v1');

  
        
       
        $q = "SELECT a1.nom_fase, v1.cod_ambiente, v3.cod_ficha, r1.nom_act_proyecto,
        l1.nom_acti, o1.nom_result, p1.nom_compe, v1.nom_ambiente, v6.nom_instructor, v6.ape_instructor, v6.especialidad, y1.nom_programa, m1.nom_trimestre, m1.cod_trimestre,
         v3.fec_inicio, v3.fec_fin, x1.nom_jornada, n2.cod_temp, v4.nom_dia, v5.hora_inicio, v5.hora_fin FROM detalles 
        inner join competencia as p1 on detalles.cod_compe = p1.cod_compe 
        inner join fases as a1 on detalles.cod_fase = a1.cod_fase
        inner join actividad_proyecto as r1 on detalles.cod_act_proyecto = r1.cod_act_proyecto
        inner join actividad_aprendizaje as l1 on detalles.cod_acti = l1.cod_acti
        inner join resultado_aprendizaje as o1 on detalles.cod_result = o1.cod_result
        inner join ambientes as v1 on detalles.cod_ambiente = v1.cod_ambiente
        inner join programa as y1 on detalles.cod_programa = y1.cod_programa  
        inner join trimestre as m1 on detalles.cod_trimestre = m1.cod_trimestre
        inner join jornada as x1 on detalles.cod_jornada = x1.cod_jornada       
        inner join temporada as n2 on n2.cod_temp = detalles.cod_temp
        inner join ficha as v3 on v3.cod_ficha = detalles.cod_ficha
        inner join dia as v4 on v4.cod_dia = detalles.cod_dia
        inner join duracion v5 on v5.cod_duracion = detalles.cod_duracion
        inner join instructor as v6 on v6.cod_instructor = detalles.cod_instructor";


        if(!empty($_POST['s_anio']))
            $q .=" WHERE n2.cod_temp=".$_POST['s_anio'];
        if(!empty($_POST['s_trimes']))
            $q .=" AND m1.cod_trimestre=".$_POST['s_trimes'];
        if(!empty($_POST['s_ficha']))
            $q .=" AND v3.cod_ficha=".$_POST['s_ficha'];
        
        

        $prepare = $conn->prepare($q);
    $prepare->execute();
    $resultSet = $prepare->get_result();
    while($detalles[] = $resultSet->fetch_array());
    $resultSet->Close();
    $prepare->Close();
    $conn->Close();
        $detalles1=$detalles;

        $html = '
        <h1>Cronograma Ficha</h1>

        <table border="1" style="width:10%;">
        <tr>
            <td  rowspan="4"><img src="reportes/img/logo.png" width="10%"></td>
            
            <td>Programacion de Eventos</td>
        </tr>
        <tr>
        <td style="height:10px" style="width:940%;">F002-P002-08-11-9216</td>
        </tr>
        <tr>
            
            <td>Proceso: EJECUCION DE LA FORMACION PROFESIONAL.</td>
        </tr>
        <tr>
            <td>Procedimiento: Desarrollo Curricular.</td>
        </tr>   
        </table>
        ';
                
        foreach ($detalles as $detalles) {
            $html .= '
                    <table border="1"  style="width:100%;"> </header>
                
                            <tr>
                                <td style="width:20%;" >Ficha: ' .$detalles['cod_ficha']. '</td>
                                <td>Trimestre:  ' .$detalles['nom_trimestre']. '</td>
                                <td>A&ntilde;o: ' .$detalles['cod_temp']. '</td>
                                <td>Codigo del programa: ' .$detalles['cod_ficha']. '</td>
                                
                            </tr>
</table>
        
          
        <table  border="1" style="width:10%;">
        <tr>
        <td  style="width:235%;">Competencia: ' .$detalles['nom_fase']. '</td>
            <td style="height:20px" style="width:400%;">Programa: ' .$detalles['nom_programa']. ' </td>
            <td style="height:20px" style="width:235%;">Proyecto: ' .$detalles['nom_act_proyecto']. '</td>
            <td style="width:235%;">Jornada: ' .$detalles['nom_jornada']. '</td>
            


        </tr>
        </table>
        <table border="1" style="height:10px" style="width:10%;" >
        </table>
        </thead>';
                                                        break;
                        } 
$html .='<table border="1" style="width:100%;">'
            .'<tr>
                                <td>NOMBRE DEL INSTRUCTOR</td>
                                <td>FASE DEL PROYECTO</td>
                                <td>ACTIVIDAD DEL PROYECTO</td>
                                <td>ACTIVIDAD DE APRENDIZAJE</td>
                                <td>RESULTADO DE APRENDIZAJE</td>
                                <td>COMPETENCIA</td>
                                <td>AMBIENTE DE APRENDIZAJE</td>
                                <td>HORARIO</td>
                                <td>FECHA INICIO</td>
                                <td>FECHA FIN</td>
                                
                            </tr>';
    
foreach ($detalles1 as $detalles1) {
    $html .='<tr>                   
                                    <td  class="Instructor">' .$detalles1['nom_instructor']. ' ' .$detalles1['ape_instructor']. ' - Especialidad: ' .$detalles1['especialidad']. '</td>
                                    <td  >' .$detalles1['nom_fase']. '</td>
                                    <td  class="Instructor">' .$detalles1['nom_act_proyecto']. '</td>
                                    <td  class="Competencia">' .$detalles1['nom_acti']. '</td>
                                    <td  class="Resultado de aprendizaje">' .$detalles1['nom_result']. '</td>
                                    <td  class="Ficha">' .$detalles1['nom_compe']. '</td>
                                    <td  class="Hora">' .$detalles1['cod_ambiente'].'- Aula:  '.$detalles1['nom_ambiente']. '</td>
                                    <td  class="Horario">' .$detalles1['nom_dia'].' ' .$detalles1['hora_inicio'].' '.$detalles1['hora_fin'].' </td>
                                    <td  class="Fecha inicio">' .$detalles1['fec_inicio']. '</td>
                                    <td  class="Fecha fin">' .$detalles1['fec_fin']. '</td>
                                    
                                    
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
    $mpdf->Output('ficha.pdf', 'I');
    ?>
