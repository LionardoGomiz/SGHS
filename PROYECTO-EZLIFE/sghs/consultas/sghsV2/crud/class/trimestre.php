<?php
require_once 'conexion.php';
class Trimestre extends Conexion {

    public $mysqli;
    public $data;

    public function __construct() {
        $this->mysqli = parent::conectar();
        $this->data = array();
    }

    //*****************************************************************
    // LISTAMOS DE TODOS LOS INSTRUCTORES
    //*****************************************************************
    public function trimestre(){
        $resultado = $this->mysqli->query("SELECT * from trimestre;
  
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
            "INSERT INTO trimestre values(null, %s, %s, %s, %s);",
            parent::comillas_inteligentes($_POST['dt']),
            parent::comillas_inteligentes($_POST['fi']),
            parent::comillas_inteligentes($_POST['ff']), 
            parent::comillas_inteligentes($_POST['año'])
            );
        $this->mysqli->query($consulta);

    }
    //*****************************************************************
    // MODIFICAR
    //*****************************************************************
    public function update() {

        $consulta = sprintf(
            "UPDATE trimestre SET
            desc_trimestre = %s,
            fecha_inicio_trimestre = %s,
            fecha_fin_trimestre = %s,
            año_trimestre = %s
            WHERE
            id_trimestre = %s;", 
            parent::comillas_inteligentes($_POST['dt']), 
            parent::comillas_inteligentes($_POST['fi']),
            parent::comillas_inteligentes($_POST['ff']),
            parent::comillas_inteligentes($_POST['año']),
            parent::comillas_inteligentes($_POST['id_trimestre'])
            );

        $this->mysqli->query($consulta);

        //echo "<script type='text/javascript'>window.location='ver.php';</script>";
    }
    //*****************************************************************
    // ELIMINAR
    //*****************************************************************
    public function delete($id) {
        $query = sprintf(
            "DELETE FROM trimestre WHERE id_trimestre = %s;", 
            parent::comillas_inteligentes($id)
            );
        $this->mysqli->query($query);
        header("Location: ver.php");
    }
    //*****************************************************************
    // POR ID
    //*****************************************************************
    public function trimestrePorId($id){
        $consulta = sprintf("SELECT *  from  trimestre
            WHERE
            id_trimestre = %s", 
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