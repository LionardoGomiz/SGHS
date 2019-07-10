<?php
require_once 'conexion.php';
class Competencia extends Conexion {

    public $mysqli;
    public $data;

    public function __construct() {
        $this->mysqli = parent::conectar();
        $this->data = array();
    }

    //*****************************************************************
    // LISTAMOS DE TODOS LOS INSTRUCTORES
    //*****************************************************************
    public function competencia(){
        $resultado = $this->mysqli->query("SELECT * from competencia;
  
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
            "INSERT INTO competencia values(%s, %s, %s, %s, %s);",  
            parent::comillas_inteligentes($_POST['codigo']),
            parent::comillas_inteligentes($_POST['nombre']),
            parent::comillas_inteligentes($_POST['resultado']),
            parent::comillas_inteligentes($_POST['fase']),
            parent::comillas_inteligentes($_POST['actividad'])
            );
        $this->mysqli->query($consulta);

    }
    //*****************************************************************
    // MODIFICAR
    //*****************************************************************
    public function update() {

        $consulta = sprintf(
            "UPDATE competencia SET
            cod_compe = %s,
            nom_compe = %s
            WHERE
            cod_compe = %s;", 
            parent::comillas_inteligentes($_POST['codigo']),
            parent::comillas_inteligentes($_POST['nombre']),
            parent::comillas_inteligentes($_POST['cod_compe'])
            );

        $this->mysqli->query($consulta);

        //echo "<script type='text/javascript'>window.location='ver.php';</script>";
    }
    //*****************************************************************
    // ELIMINAR
    //*****************************************************************
    public function delete($id) {
        $query = sprintf(
            "DELETE FROM competencia WHERE cod_compe = %s;", 
            parent::comillas_inteligentes($id)
            );
        $this->mysqli->query($query);
        header("Location: ver.php");
    }
    //*****************************************************************
    // POR ID
    //*****************************************************************
    public function competenciaPorId($id){
        $consulta = sprintf("SELECT *  from competencia
            WHERE
            cod_compe = %s", 
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