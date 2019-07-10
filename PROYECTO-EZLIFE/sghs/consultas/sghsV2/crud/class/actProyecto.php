<?php
require_once 'conexion.php';
class Actproyecto extends Conexion {

    public $mysqli;
    public $data;

    public function __construct() {
        $this->mysqli = parent::conectar();
        $this->data = array();
    }

    //*****************************************************************
    // LISTAMOS DE TODOS LOS INSTRUCTORES
    //*****************************************************************
    public function actproyecto(){
        $resultado = $this->mysqli->query("SELECT
            actividad_proyecto.cod_act_proyecto,
            actividad_proyecto.nom_act_proyecto,
            fases.nom_fase
            FROM actividad_proyecto
            INNER JOIN fases ON actividad_proyecto.cod_fase = fases.cod_fase

  
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

        $consulta = sprintf(
            "INSERT INTO actividad_proyecto values(%s, %s, %s);",  
            parent::comillas_inteligentes($_POST['codigo']),
            parent::comillas_inteligentes($_POST['nombre']),
            parent::comillas_inteligentes($_POST['fase'])
            );
        $this->mysqli->query($consulta);

    }
    //*****************************************************************
    // MODIFICAR
    //*****************************************************************
    public function update() {

        $consulta = sprintf(
            "UPDATE actividad_proyecto SET
            cod_act_proyecto = %s,
            nom_act_proyecto = %s,
            cod_fase = %s

            WHERE
            cod_act_proyecto = %s;", 
            parent::comillas_inteligentes($_POST['codigo']),
            parent::comillas_inteligentes($_POST['actividad']),
            parent::comillas_inteligentes($_POST['fase']),
            parent::comillas_inteligentes($_POST['cod_act_proyecto'])
            );

        $this->mysqli->query($consulta);

        echo "<script type='text/javascript'>window.location='ver.php';</script>";
    }
    //*****************************************************************
    // ELIMINAR
    //*****************************************************************
    public function delete($id) {
        $query = sprintf(
            "DELETE FROM actividad_proyecto WHERE cod_act_proyecto = %s;", 
            parent::comillas_inteligentes($id)
            );
        $this->mysqli->query($query);
        header("Location: ver.php");
    }
    //*****************************************************************
    // POR ID
    //*****************************************************************
    public function actproyectoPorId($id){
        $consulta = sprintf("SELECT *  from actividad_proyecto
            WHERE
            cod_act_proyecto = %s", 
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