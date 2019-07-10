<?php
require_once 'conexion.php';
class Jornada extends Conexion {

    public $mysqli;
    public $data;

    public function __construct() {
        $this->mysqli = parent::conectar();
        $this->data = array();
    }

    //*****************************************************************
    //
    //*****************************************************************
    public function jornada(){
        $resultado = $this->mysqli->query("SELECT * FROM jornada");

        while( $fila = $resultado->fetch_assoc() ){
            $data[] = $fila;
        }

        if (isset($data)) {
            return $data; 
        } 
        
    }

}

?>