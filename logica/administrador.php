<?php

require_once(PERSISTENCE_PATH."administradorDAO.php");
require_once("usuario.php");

class Administrador extends Usuario{

    private $administradorDAO;
    private $conexion;

    function Administrador($_id="", $_nombre="", $_cc="", $_telefono="", $_direccion="", $_correo="", $_contraseña=""){
        $this->id = $_id;
        $this->nombre = $_nombre;
        $this->cc = $_cc;
        $this->telefono = $_telefono;
        $this->direccion = $_direccion;
        $this->correo = $_correo;
        $this->contraseña = $_contraseña;
        $this->conexion = new Conexion();
        $this->administradorDAO = new AdministradorDAO($_id, $_nombre, $_cc, $_telefono, $_direccion, $_correo, $_contraseña);
    }

    function getId(){
        return $this->id;
    }

    function getNombre(){
        return $this->nombre;
    }

    function getCc(){
        return $this->cc;
    }

    function getTelefono(){
        return $this->telefono;
    }

    function getDireccion(){
        return $this->direccion;
    }

    function getCorreo(){
        return $this->correo;
    }

    function getContraseña(){
        return $this->contraseña;
    }

    function autenticar(){
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->administradorDAO->autenticar());
        $this->conexion->cerrar();
        if($this->conexion->numFilas() == 1){
            $this->id = $this->conexion->extraer()[0];
            $this->administradorDAO->setId($this->id);
            return true;
        }else{
            return false;
        }
    }

    function consultarAdmin(){
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->administradorDAO->consultarAdmin());
        $this->conexion->cerrar();
        if($this->conexion->numFilas() == 1){
            $this->id = $this->conexion->extraer()[0];
            return true;
        }else{
            return false;
        }
    }

    function consultarUsuario(){
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->administradorDAO->consultarUsuario());
        $this->conexion->cerrar();
        $resultado = $this->conexion->extraer();
        $this->nombre = $resultado[0];
    }

    function modificarUsuario(){
        return null;
    }

    function crearUsuario(){
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->administradorDAO->crearUsuario());
        $this->conexion->cerrar();
    }

    function asignarTipoUsuario(){
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->administradorDAO->asignarUsuarioAdmin());
        $this->conexion->cerrar();
    }

    function consultarIDUsuario(){
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->administradorDAO->consultarIDUsuario());
        $this->conexion->cerrar();
        $resultado = $this->conexion->extraer();
        $this->id = $resultado[0];
        $this->administradorDAO->setId($this->id);
    }
    
    function inhabilitarUsuario(){
        return null;
    }

}

?>