<?php
require_once 'conexion.php';
class Cronograma extends Conexion {

    public $mysqli;
    public $data;
    public $dia;

    public function __construct() {
        $this->mysqli = parent::conectar();
        $this->data = array();
    }

    //*****************************************************************
    // LISTAMOS 
    //*****************************************************************
    public function cronograma(){
        $resultado = $this->mysqli->query("SELECT * from detalles;
  
            ");

        while( $fila = $resultado->fetch_assoc() ){
            $data[] = $fila;
        }

        if (isset($data)) {
            return $data; 
        } 
        
    }
    //*****************************************************************
    // AGREGAR
    //*****************************************************************
    public function add() {
        $hora = $this->mysqli->query("SELECT * FROM detalles WHERE detalles.cod_duracion='$_POST[duracion]' and detalles.cod_dia = '$_POST[dia]' and detalles.cod_ambiente = '$_POST[ambiente]'");

        if(mysqli_num_rows($hora)>0){
            echo "ya esta vinculado con el dia y la hora";
        }else{
        $consulta = sprintf(
            "INSERT INTO detalles values(null, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s);",
            parent::comillas_inteligentes($_POST['ficha']),
            parent::comillas_inteligentes($_POST['trimestre']),
            parent::comillas_inteligentes($_POST['temporada']),
            parent::comillas_inteligentes($_POST['programa']),
            parent::comillas_inteligentes($_POST['jornada']),
            parent::comillas_inteligentes($_POST['competencia']),
            parent::comillas_inteligentes($_POST['fase']),
            parent::comillas_inteligentes($_POST['proyecto']),
            parent::comillas_inteligentes($_POST['actividad']),
            parent::comillas_inteligentes($_POST['resultado']),
            parent::comillas_inteligentes($_POST['ambiente']),
            parent::comillas_inteligentes($_POST['dia']),
            parent::comillas_inteligentes($_POST['duracion']),
            parent::comillas_inteligentes($_POST['instructor'])
            );
    $this->mysqli->query($consulta);

}
}
    //*****************************************************************
    // MODIFICAR
    //*****************************************************************
    public function update() {

        $consulta = sprintf(
            "UPDATE detalles SET
            cod_ficha = %s,
            cod_trimestre = %s,
            cod_temp = %s,
            cod_programa = %s,
            cod_jornada = %s,
            cod_compe = %s,
            cod_fase = %s,
            cod_act_proyecto = %s,
            cod_acti = %s,
            cod_result = %s,
            cod_ambiente = %s,
            cod_dia = %s,
            cod_duracion = %s,
            cod_instructor = %s
            WHERE
            cod_detalles = %s;", 
            parent::comillas_inteligentes($_POST['ficha']),
            parent::comillas_inteligentes($_POST['trimestre']),
            parent::comillas_inteligentes($_POST['temporada']),
            parent::comillas_inteligentes($_POST['programa']),
            parent::comillas_inteligentes($_POST['jornada']),
            parent::comillas_inteligentes($_POST['competencia']),
            parent::comillas_inteligentes($_POST['fase']),
            parent::comillas_inteligentes($_POST['proyecto']),
            parent::comillas_inteligentes($_POST['actividad']),
            parent::comillas_inteligentes($_POST['resultado']),
            parent::comillas_inteligentes($_POST['ambiente']),
            parent::comillas_inteligentes($_POST['dia']),
            parent::comillas_inteligentes($_POST['duracion']),
            parent::comillas_inteligentes($_POST['instructor']),
            parent::comillas_inteligentes($_POST['cod_detalles'])
            );

        $this->mysqli->query($consulta);

    echo "<script type='text/javascript'>window.location='ver.php';</script>";
    }
    //*****************************************************************
    // ELIMINAR
    //*****************************************************************
    public function delete($id) {
        $query = sprintf(
            "DELETE FROM detalles WHERE cod_detalles = %s;", 
            parent::comillas_inteligentes($id)
            );
        $this->mysqli->query($query);
        header("Location: ver.php");
    }
    //*****************************************************************
    // POR ID
    //*****************************************************************
    public function PorId($id){
        $consulta = sprintf("SELECT *  from detalles
            WHERE
            cod_detalles = %s", 
            parent::comillas_inteligentes($id)
            );

        $resultado = $this->mysqli->query($consulta);

        while( $fila = $resultado->fetch_assoc() ){
            $data[] = $fila;
        }

        if (isset($data)) {
            return $data; 
        }
    }

}
?>