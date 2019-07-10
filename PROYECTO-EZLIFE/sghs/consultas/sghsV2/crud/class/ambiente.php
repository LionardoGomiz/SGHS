<?php
require_once 'conexion.php';
class Ambiente extends Conexion {

    public $mysqli;
    public $data;

    public function __construct() {
        $this->mysqli = parent::conectar();
        $this->data = array();
    }

    //*****************************************************************
    // LISTAMOS DE TODOS LOS INSTRUCTORES
    //*****************************************************************
    public function ambiente(){
        $resultado = $this->mysqli->query("SELECT
            ambientes.cod_ambiente,
            ambientes.nom_ambiente,
            sede.nom_sede
            FROM
            ambientes
            INNER JOIN sede ON ambientes.cod_sede = sede.cod_sede
  
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
            "INSERT INTO ambientes values(%s, %s, %s);",   
            parent::comillas_inteligentes($_POST['codigo']),
            parent::comillas_inteligentes($_POST['nombre']),
            parent::comillas_inteligentes($_POST['sede'])
            );
        $this->mysqli->query($consulta);

    }
    //*****************************************************************
    // MODIFICAR
    //*****************************************************************
    public function update() {

        $consulta = sprintf(
            "UPDATE ambiente SET
            desc_ambiente = %s
            WHERE
            id_ambiente = %s;", 
            parent::comillas_inteligentes($_POST['am']), 
            parent::comillas_inteligentes($_POST['id_ambiente'])
            );

        $this->mysqli->query($consulta);

        echo "<script type='text/javascript'>window.location='ver.php';</script>";
    }
    //*****************************************************************
    // ELIMINAR
    //*****************************************************************
    public function delete($id) {
        $query = sprintf(
            "DELETE FROM ambientes WHERE cod_ambiente = %s;", 
            parent::comillas_inteligentes($id)
            );
        $this->mysqli->query($query);
        header("Location: ver.php");
    }
    //*****************************************************************
    // POR ID
    //*****************************************************************
    public function ambientePorId($id){
        $consulta = sprintf("SELECT *  from  ambientes
            WHERE
            cod_ambiente = %s", 
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