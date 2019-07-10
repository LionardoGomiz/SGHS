<?php
require_once 'conexion.php';
class Fase extends Conexion {

    public $mysqli;
    public $data;

    public function __construct() {
        $this->mysqli = parent::conectar();
        $this->data = array();
    }

    //*****************************************************************
    // LISTAMOS DE TODOS LOS INSTRUCTORES
    //*****************************************************************
    public function fase(){
        $resultado = $this->mysqli->query("SELECT * from fase_proyecto;
  
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
            "INSERT INTO fase_proyecto values(null, %s);",  
            parent::comillas_inteligentes($_POST['fa'])
            );
        $this->mysqli->query($consulta);

    }
    //*****************************************************************
    // MODIFICAR
    //*****************************************************************
    public function update() {

        $consulta = sprintf(
            "UPDATE fase_proyecto SET
            fase = %s
            WHERE
            id_fase = %s;", 
            parent::comillas_inteligentes($_POST['fa']),
            parent::comillas_inteligentes($_POST['id_fase'])
            );

        $this->mysqli->query($consulta);

        echo "<script type='text/javascript'>window.location='ver.php';</script>";
    }
    //*****************************************************************
    // ELIMINAR
    //*****************************************************************
    public function delete($id) {
        $query = sprintf(
            "DELETE FROM fase_proyecto WHERE id_fase = %s;", 
            parent::comillas_inteligentes($id)
            );
        $this->mysqli->query($query);
        header("Location: ver.php");
    }
    //*****************************************************************
    // POR ID
    //*****************************************************************
    public function fasePorId($id){
        $consulta = sprintf("SELECT *  from fase_proyecto
            WHERE
            id_fase = %s", 
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