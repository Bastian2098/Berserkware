<?php

require "persistencia/administradorDAO.php";

class Administrador extends Usuario{

    private $administradorDAO;

    function Administrador($_id="", $_nombre="", $_cc="", $_telefono="", $_direccion="", $_correo="", $_contraseña=""){
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

    public function autenticar(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> administradorDAO -> autenticar());
        echo $this -> administradorDAO -> autenticar();
        $this -> conexion -> cerrar();
        if($this -> conexion -> numFilas() == 1){
            $this -> idAdministrador = $this -> conexion -> extraer()[0];
            return true;
        }else{
            return false;
        }
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