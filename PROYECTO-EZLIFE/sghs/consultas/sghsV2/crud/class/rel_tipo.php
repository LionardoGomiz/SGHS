<?php
require_once 'conexion.php';
class Tiporol extends Conexion {

    public $mysqli;
    public $data;

    public function __construct() {
        $this->mysqli = parent::conectar();
        $this->data = array();
    }

    //*****************************************************************
    //
    //*****************************************************************
    public function tiporol(){
        $resultado = $this->mysqli->query("SELECT * FROM tipo_usuario");

        while( $fila = $resultado->fetch_assoc() ){
            $data[] = $fila;
        }

        if (isset($data)) {
            return $data; 
        } 
        
    }

}

?>