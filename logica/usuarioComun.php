<?php

require_once(PERSISTENCE_PATH."usuarioComunDAO.php");
require_once("usuario.php");

class UsuarioComun extends Usuario{

    private $usuarioComunDAO;
    private $conexion;

    function UsuarioComun($_id="", $_nombre="", $_cc="", $_telefono="", $_direccion="", $_correo="", $_contraseña=""){
        $this->id = $_id;
        $this->nombre = $_nombre;
        $this->cc = $_cc;
        $this->telefono = $_telefono;
        $this->direccion = $_direccion;
        $this->correo = $_correo;
        $this->contraseña = $_contraseña;
        $this->conexion = new Conexion();
        $this->usuarioComunDAO = new UsuarioComunDAO($_id,$_nombre,$_cc,$_telefono,$_direccion,$_correo,$_contraseña);
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
        $this->conexion->ejecutar($this->usuarioComunDAO->autenticar());
        $this->conexion->cerrar();
        if($this->conexion->numFilas() == 1){
            $this->id = $this->conexion->extraer()[0];
            $this->usuarioComunDAO->setId($this->id);
            return true;
        }else{
            return false;
        }
    }

    function consultarComun(){
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->usuarioComunDAO->consultarComun());
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
        $this->conexion->ejecutar($this->usuarioComunDAO->consultarUsuario());
        $this->conexion->cerrar();
        $resultado = $this->conexion->extraer();
        $this->nombre = $resultado[0];
    }

    function consultarTodo(){
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->usuarioComunDAO->consultarTodo());
        $this->conexion->cerrar();
        $resultado = $this->conexion->extraer();
        $this->nombre = $resultado[0];
        $this->cc = $resultado[1];
        $this->direccion = $resultado[2];
        $this->telefono = $resultado[3];
    }

    function modificarUsuario(){
        return null;
    }

    function modificarNombre($nuevoNombre){
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->usuarioComunDAO->modificarNombre($nuevoNombre));
        $this->conexion->cerrar();
    }

    function modificarCc($nuevoCc){
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->usuarioComunDAO->modificarCc($nuevoCc));
        $this->conexion->cerrar();
    }

    function modificarDireccion($nuevoDireccion){
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->usuarioComunDAO->modificarDireccion($nuevoDireccion));
        $this->conexion->cerrar();
    }

    function modificarTelefono($nuevoTelefono){
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->usuarioComunDAO->modificarTelefono($nuevoTelefono));
        $this->conexion->cerrar();
    }

    function crearUsuario(){
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->usuarioComunDAO->crearUsuario());
        $this->conexion->cerrar();
    }

    function asignarTipoUsuario(){
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->usuarioComunDAO->asignarUsuarioComun());
        $this->conexion->cerrar();
    }

    function consultarIDUsuario(){
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->usuarioComunDAO->consultarIDUsuario());
        $this->conexion->cerrar();
        $resultado = $this->conexion->extraer();
        $this->id = $resultado[0];
        $this->usuarioComunDAO->setId($this->id);
    }

    function inhabilitarUsuario(){
        return null;
    }

}

?>