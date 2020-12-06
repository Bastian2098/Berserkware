<?php

require "persistencia/usuarioComunDAO.php";

class usuarioComun extends usuario{

    private $usuarioComunDAO;

    function Usuario($_id="", $_nombre="", $_cc="", $_telefono="", $_direccion="", $_correo="", $_contraseña=""){
        $this->id = $_id;
        $this->nombre = $_nombre;
        $this->cc = $_cc;
        $this->telefono = $_telefono;
        $this->direccion = $_direccion;
        $this->correo = $_correo;
        $this->contraseña = $_contraseña;
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
        return null;
    }

    function consultarUsuario(){
        return null;
    }

    function modificarUsuario(){
        return null;
    }

    function crearUsuario(){
        return null;
    }

    function inhabilitarUsuario(){
        return null;
    }

}

?>