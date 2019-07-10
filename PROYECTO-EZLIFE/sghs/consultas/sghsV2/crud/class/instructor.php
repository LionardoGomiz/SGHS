<?php
require_once 'conexion.php';
class Instructor extends Conexion {

    public $mysqli;
    public $data;

    public function __construct() {
        $this->mysqli = parent::conectar();
        $this->data = array();
    }

    //*****************************************************************
    // LISTAMOS DE TODOS LOS INSTRUCTORES
    //*****************************************************************
    public function instructor(){
        $resultado = $this->mysqli->query("SELECT * from instructor;
  
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
            "INSERT INTO instructor values(null, %s, %s, %s, %s, %s);",  
            parent::comillas_inteligentes($_POST['nombre']), 
            parent::comillas_inteligentes($_POST['apellido']),
            parent::comillas_inteligentes($_POST['perfil']),
            parent::comillas_inteligentes($_POST['ficha']),
            parent::comillas_inteligentes($_POST['tipo'])
            );
        $this->mysqli->query($consulta);

    }
    //*****************************************************************
    // MODIFICAR
    //*****************************************************************
    public function update() {

        $consulta = sprintf(
            "UPDATE instructor SET
            nom_instructor = %s,
            ape_instructor = %s,
            especialidad = %s,
            WHERE
            cod_instructor = %s;",  
            parent::comillas_inteligentes($_POST['nombre']), 
            parent::comillas_inteligentes($_POST['apellido']),
            parent::comillas_inteligentes($_POST['perfil']),
            parent::comillas_inteligentes($_POST['cod_instructor'])
            );

        $this->mysqli->query($consulta);

        //echo "<script type='text/javascript'>window.location='ver.php';</script>";
    }
    //*****************************************************************
    // ELIMINAR
    //*****************************************************************
    public function delete($id) {
        $query = sprintf(
            "DELETE FROM instructor WHERE cod_instructor = %s;", 
            parent::comillas_inteligentes($id)
            );
        $this->mysqli->query($query);
        header("Location: ver.php");
    }
    //*****************************************************************
    // POR ID
    //*****************************************************************
    public function instructorPorId($id){
        $consulta = sprintf("SELECT *  from  instructor
            WHERE
            cod_instructor = %s", 
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