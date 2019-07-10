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
    // LISTAMOS DE TODOS LOS INSTRUCTORES
    //*****************************************************************
    public function ficha(){
        $resultado = $this->mysqli->query("SELECT 
            ficha.cod_ficha,
            ficha.fec_inicio,
            ficha.fec_fin,
            programa.nom_programa,
            trimestre.nom_trimestre
            FROM ficha
            INNER JOIN programa ON ficha.cod_programa = programa.cod_programa
            INNER JOIN trimestre ON ficha.cod_trimestre = trimestre.cod_trimestre
  
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
            "INSERT INTO ficha values(%s, %s, %s, %s, %s);",  
            parent::comillas_inteligentes($_POST['ficha']), 
            parent::comillas_inteligentes($_POST['fechaInicio']),
            parent::comillas_inteligentes($_POST['fechaFin']),
            parent::comillas_inteligentes($_POST['programa']),
            parent::comillas_inteligentes($_POST['trimestre'])
            );
        $this->mysqli->query($consulta);

    }
    //*****************************************************************
    // MODIFICAR
    //*****************************************************************
    public function update() {

        $consulta = sprintf(
            "UPDATE ficha SET
            cod_ficha = %s,
            fec_inicio = %s,
            fec_fin = %s,
            cod_programa = %s,
            cod_trimestre = %s
            WHERE
            cod_ficha = %s;", 
            parent::comillas_inteligentes($_POST['ficha']), 
            parent::comillas_inteligentes($_POST['fechaInicio']),
            parent::comillas_inteligentes($_POST['fechaFin']),
            parent::comillas_inteligentes($_POST['programa']),
            parent::comillas_inteligentes($_POST['trimestre']),
            parent::comillas_inteligentes($_POST['cod_ficha'])
            );

        $this->mysqli->query($consulta);

       echo "<script type='text/javascript'>window.location='ver.php';</script>";
    }
    //*****************************************************************
    // ELIMINAR
    //*****************************************************************
    public function delete($id) {
        $query = sprintf(
            "DELETE FROM ficha WHERE cod_ficha = %s;", 
            parent::comillas_inteligentes($id)
            );
        $this->mysqli->query($query);
        header("Location: ver.php");
    }
    //*****************************************************************
    // POR ID
    //*****************************************************************
    public function fichaPorId($id){
        $consulta = sprintf("SELECT *  from ficha
            WHERE
            cod_ficha = %s", 
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