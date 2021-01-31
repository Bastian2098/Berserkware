<?php

require_once "conexion.php";

class LogDAO{

    private $id;
    private $actividad;
    private $usuario;
    private $fecha;

    public function LogDAO($_id, $_actividad, $_usuario, $_fecha){
        $this->id = $_id;
        $this->actividad = $_actividad;
        $this->usuario = $_usuario;
        $this->fecha = $_fecha;
    }

    function consultarLog(){
        return "select ID_LOG, actividad, ID_USUARIO_FK, fecha from Log";
    }

    function insertarActividad(){
        return "insert into Log (actividad, ID_USUARIO_FK, fecha) values ('".$this->actividad."', '".$this->usuario."', '".$this->fecha."')";
    }

}

?>