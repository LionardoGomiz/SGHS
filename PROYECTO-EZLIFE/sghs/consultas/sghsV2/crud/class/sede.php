<?php
require_once 'conexion.php';
class Sede extends Conexion {

    public $mysqli;
    public $data;

    public function __construct() {
        $this->mysqli = parent::conectar();
        $this->data = array();
    }

    //*****************************************************************
    // LISTAMOS 
    //*****************************************************************
    public function sede(){
        $resultado = $this->mysqli->query("SELECT * from sede;
  
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
            "INSERT INTO sede values(%s, %s, %s);",
            parent::comillas_inteligentes($_POST['cod']),
            parent::comillas_inteligentes($_POST['ns']),
            parent::comillas_inteligentes($_POST['ds'])
            );
        $this->mysqli->query($consulta);

    }
    //*****************************************************************
    // MODIFICAR
    //*****************************************************************
    public function update() {

        $consulta = sprintf(
            "UPDATE sede SET
            nom_sede = %s,
            direccion = %s
            WHERE
            cod_sede = %s;", 
            parent::comillas_inteligentes($_POST['ns']),
             parent::comillas_inteligentes($_POST['dir']),   
            parent::comillas_inteligentes($_POST['cod_sede'])
            );

        $this->mysqli->query($consulta);

    echo "<script type='text/javascript'>window.location='ver.php';</script>";
    }
    //*****************************************************************
    // ELIMINAR
    //*****************************************************************
    public function delete($id) {
        $query = sprintf(
            "DELETE FROM sede WHERE cod_sede = %s;", 
            parent::comillas_inteligentes($id)
            );
        $this->mysqli->query($query);
        header("Location: ver.php");
    }
    //*****************************************************************
    // POR ID
    //*****************************************************************
    public function PorId($id){
        $consulta = sprintf("SELECT *  from sede
            WHERE
            cod_sede = %s", 
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