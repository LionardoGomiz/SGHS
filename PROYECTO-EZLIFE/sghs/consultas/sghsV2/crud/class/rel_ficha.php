<?php
require_once 'conexion.php';
class Ficha extends Conexion {

    public $mysqli;
    public $data;

    public function __construct() {
        $this->mysqli = parent::conectar();
        $this->data = array();
    }

    //*****************************************************************
    //
    //*****************************************************************
    public function ficha(){
        $resultado = $this->mysqli->query("SELECT * FROM ficha");

        while( $fila = $resultado->fetch_assoc() ){
            $data[] = $fila;
        }

        if (isset($data)) {
            return $data; 
        } 
        
    }

}

?>