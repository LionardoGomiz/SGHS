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
    // LISTAMOS DE TODOS LOS INSTRUCTORES
    //*****************************************************************
    public function programa(){
        $resultado = $this->mysqli->query("SELECT * from programa;
  
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
            "INSERT INTO programa values(%s, %s, %s);",  
            parent::comillas_inteligentes($_POST['codigo']),
            parent::comillas_inteligentes($_POST['nombre']),
            parent::comillas_inteligentes($_POST['tipo'])
            );
        $this->mysqli->query($consulta);

    }
    //*****************************************************************
    // MODIFICAR
    //*****************************************************************
    public function update() {

        $consulta = sprintf(
            "UPDATE programa SET
            cod_programa = %s,
            nom_programa = %s

            WHERE
            cod_programa = %s;", 
            parent::comillas_inteligentes($_POST['codigo']),
            parent::comillas_inteligentes($_POST['nombre']),
            parent::comillas_inteligentes($_POST['cod_programa'])
            );

        $this->mysqli->query($consulta);

        echo "<script type='text/javascript'>window.location='ver.php';</script>";
    }
    //*****************************************************************
    // ELIMINAR
    //*****************************************************************
    public function delete($id) {
        $query = sprintf(
            "DELETE FROM programa WHERE cod_programa = %s;", 
            parent::comillas_inteligentes($id)
            );
        $this->mysqli->query($query);
        header("Location: ver.php");
    }
    //*****************************************************************
    // POR ID
    //*****************************************************************
    public function PorId($id){
        $consulta = sprintf("SELECT *  from programa
            WHERE
            cod_programa = %s", 
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