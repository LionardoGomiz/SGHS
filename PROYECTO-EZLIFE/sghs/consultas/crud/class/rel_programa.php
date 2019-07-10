<?php
require_once 'conexion.php';
class Programa extends Conexion {

    public $mysqli;
    public $data;

    public function __construct() {
        $this->mysqli = parent::conectar();
        $this->data = array();
    }

    //*****************************************************************
    //
    //*****************************************************************
    public function programa(){
        $resultado = $this->mysqli->query("SELECT * FROM programa");

        while( $fila = $resultado->fetch_assoc() ){
            $data[] = $fila;
        }

        if (isset($data)) {
            return $data; 
        } 
        
    }

        //*****************************************************************
    public function programabycode($codprograma){
        $resultado = $this->mysqli->query("SELECT ficha.cod_programa as cp, programa.nom_programa as np FROM ficha INNER JOIN programa on programa.cod_programa = ficha.cod_programa WHERE cod_ficha=".$codprograma);

        while( $fila = $resultado->fetch_assoc() ){
            $data[] = $fila;
        }

        if (isset($data)) {
            return $data; 
        } 
        
    }

}

?>