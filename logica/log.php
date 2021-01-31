<?php

require(PERSISTENCE_PATH."logDAO.php");

class Log{

    private $id;
    private $actividad;
    private $usuario;
    private $fecha;
    private $logDAO;
    private $conexion;

    public function Log($_id="", $_actividad="", $_usuario="", $_fecha=""){
        $this->id = $_id;
        $this->actividad = $_actividad;
        $this->usuario = $_usuario;
        $this->fecha = $_fecha;
        $this->conexion = new Conexion();
        $this->logDAO = new LogDAO($_id, $_actividad, $_usuario, $_fecha);
    }

    function getId(){
        return $this->id;
    }

    function getActividad(){
        return $this->actividad;
    }

    function getUsuario(){
        return $this->usuario;
    }

    function getFecha(){
        return $this->fecha;
    }

    function consultarLog(){
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->logDAO->consultarLog());
        $this->conexion->cerrar();
        $actividades = array();
        while(($resultado = $this->conexion->extraer()) != null){
            array_push($actividades, new Log($resultado[0], $resultado[1], $resultado[2], $resultado[3]));
        }
        return $actividades;
    }

    function insertarActividad(){
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->logDAO->insertarActividad());
        $this->conexion->cerrar();
    }

}

?>