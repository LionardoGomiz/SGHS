<?php
require_once 'conexion.php';
class ResultadoAprendizaje extends Conexion {

    public $mysqli;
    public $data;

    public function __construct() {
        $this->mysqli = parent::conectar();
        $this->data = array();
    }

    //*****************************************************************
    // LISTAMOS 
    //*****************************************************************
    public function resultadoprendizaje(){
        $resultado = $this->mysqli->query("SELECT * from resultado_aprendizaje;
  
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
            "INSERT INTO resultado_aprendizaje values(%s, %s);",  
            parent::comillas_inteligentes($_POST['ca']),
            parent::comillas_inteligentes($_POST['ra'])
            );
        $this->mysqli->query($consulta);

    }
    //*****************************************************************
    // MODIFICAR
    //*****************************************************************
    public function update() {

        $consulta = sprintf(
            "UPDATE resultado_aprendizaje SET
            nom_result = %s
            WHERE
            cod_result = %s;", 
            parent::comillas_inteligentes($_POST['ra']),  
            parent::comillas_inteligentes($_POST['cod_result'])
            );

        $this->mysqli->query($consulta);

        echo "<script type='text/javascript'>window.location='ver.php';</script>";
    }
    //*****************************************************************
    // ELIMINAR
    //*****************************************************************
    public function delete($id) {
        $query = sprintf(
            "DELETE FROM resultado_aprendizaje WHERE cod_result = %s;", 
            parent::comillas_inteligentes($id)
            );
        $this->mysqli->query($query);
        header("Location: ver.php");
    }
    //*****************************************************************
    // POR ID
    //*****************************************************************
    public function PorId($id){
        $consulta = sprintf("SELECT *  from  resultado_aprendizaje
            WHERE
            cod_result = %s", 
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