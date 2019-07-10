<?php
require_once 'conexion.php';
class Actaprendizaje extends Conexion {

    public $mysqli;
    public $data;

    public function __construct() {
        $this->mysqli = parent::conectar();
        $this->data = array();
    }

    //*****************************************************************
    // LISTAMOS DE TODOS LOS INSTRUCTORES
    //*****************************************************************
    public function actaprendizaje(){
        $resultado = $this->mysqli->query("SELECT * from actividad_aprendizaje;
  
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
            "INSERT INTO actividad_aprendizaje values(%s, %s);",  
            parent::comillas_inteligentes($_POST['ca']),
            parent::comillas_inteligentes($_POST['aa'])
            );
        $this->mysqli->query($consulta);

    }
    //*****************************************************************
    // MODIFICAR
    //*****************************************************************
    public function update() {

        $consulta = sprintf(
            "UPDATE actividad_aprendizaje SET
            nom_acti = %s
            WHERE
            cod_acti = %s;",
            parent::comillas_inteligentes($_POST['aa']),
            parent::comillas_inteligentes($_POST['id_aprendizaje'])
            );

        $this->mysqli->query($consulta);

        echo "<script type='text/javascript'>window.location='ver.php';</script>";
    }
    //*****************************************************************
    // ELIMINAR
    //*****************************************************************
    public function delete($id) {
        $query = sprintf(
            "DELETE FROM actividad_aprendizaje WHERE cod_acti = %s;", 
            parent::comillas_inteligentes($id)
            );
        $this->mysqli->query($query);
        header("Location: ver.php");
    }
    //*****************************************************************
    // POR ID
    //*****************************************************************
    public function ActaprendizajePorId($id){
        $consulta = sprintf("SELECT *  from actividad_aprendizaje
            WHERE
            cod_acti = %s", 
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