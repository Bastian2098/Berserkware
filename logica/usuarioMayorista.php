<?php

require_once(PERSISTENCE_PATH."usuarioMayoristaDAO.php");
require_once("usuario.php");

class UsuarioMayorista extends Usuario{

    private $nit;
    private $numTarjeta;
    private $usuarioMayoristaDAO;
    private $conexion;

    function UsuarioMayorista($_id="", $_nombre="", $_cc="", $_telefono="", $_direccion="", $_correo="", $_contraseña="", $_nit="", $_numTarjeta=""){
        $this->id = $_id;
        $this->nombre = $_nombre;
        $this->cc = $_cc;
        $this->telefono = $_telefono;
        $this->direccion = $_direccion;
        $this->correo = $_correo;
        $this->contraseña = $_contraseña;
        $this->nit = $_nit;
        $this->numTarjeta = $_numTarjeta;
        $this->conexion = new Conexion();
        $this->usuarioMayoristaDAO = new UsuarioMayoristaDAO($_id, $_nombre, $_cc, $_telefono, $_direccion, $_correo, $_contraseña, $_nit, $_numTarjeta);
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

    function getNit(){
        return $this->nit;
    }

    function getNumTarjeta(){
        return $this->numTarjeta;
    }

    function autenticar(){
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->usuarioMayoristaDAO->autenticar());
        $this->conexion->cerrar();
        if($this->conexion->numFilas() == 1){
            $this->id = $this->conexion->extraer()[0];
            $this->usuarioMayoristaDAO->setId($this->id);
            return true;
        }else{
            return false;
        }
    }

    function consultarMayorista(){
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->usuarioMayoristaDAO->consultarComun());
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
        $this->conexion->ejecutar($this->usuarioMayoristaDAO->consultarUsuario());
        $this->conexion->cerrar();
        $resultado = $this->conexion->extraer();
        $this->nombre = $resultado[0];
    }

    function modificarUsuario(){
        return null;
    }

    function crearUsuario(){
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->usuarioMayoristaDAO->crearUsuario());
        $this->conexion->cerrar();
    }

    function asignarTipoUsuario(){
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->usuarioMayoristaDAO->asignarUsuarioMayorista());
        $this->conexion->cerrar();
    }

    function consultarIDUsuario(){
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->usuarioMayoristaDAO->consultarIDUsuario());
        $this->conexion->cerrar();
        $resultado = $this->conexion->extraer();
        $this->id = $resultado[0];
        $this->usuarioMayoristaDAO->setId($this->id);
    }

    function inhabilitarUsuario(){
        return null;
    }

}

?>