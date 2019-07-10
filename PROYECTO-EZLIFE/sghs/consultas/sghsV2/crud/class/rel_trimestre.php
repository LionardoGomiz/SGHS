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
    //
    //*****************************************************************
    public function trimestre(){
        $resultado = $this->mysqli->query("SELECT * FROM trimestre");

        while( $fila = $resultado->fetch_assoc() ){
            $data[] = $fila;
        }

        if (isset($data)) {
            return $data; 
        } 
        
    }

}

?>