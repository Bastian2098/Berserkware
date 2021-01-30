<?php

require_once(PERSISTENCE_PATH."administradorDAO.php");
require_once("usuario.php");

class Administrador extends Usuario{

    private $administradorDAO;
    private $conexion;
    private $estado;

    function Administrador($_id="", $_nombre="", $_cc="", $_telefono="", $_direccion="", $_correo="", $_contraseña="", $_estado=""){
        $this->id = $_id;
        $this->nombre = $_nombre;
        $this->cc = $_cc;
        $this->telefono = $_telefono;
        $this->direccion = $_direccion;
        $this->correo = $_correo;
        $this->contraseña = $_contraseña;
        $this->estado = $_estado;
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

    function getEstado(){
        return $this->estado;
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
        $usuarios = array();
        while(($resultado = $this->conexion->extraer()) != null){
            array_push($usuarios, new Administrador($resultado[0], $resultado[1], "", "", "", $resultado[2],"", $resultado[3]));
        }
        return $usuarios;
    }

    function consultarEstado(){
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->administradorDAO->consultarEstado());
        $this->conexion->cerrar();
        $resultado = $this->conexion->extraer();
        $this->estado = $resultado[0];
    }

    function consultarTodo(){
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->administradorDAO->consultarTodo());
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
        $this->conexion->ejecutar($this->administradorDAO->modificarNombre($nuevoNombre));
        $this->conexion->cerrar();
    }

    function modificarCc($nuevoCc){
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->administradorDAO->modificarCc($nuevoCc));
        $this->conexion->cerrar();
    }

    function modificarDireccion($nuevoDireccion){
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->administradorDAO->modificarDireccion($nuevoDireccion));
        $this->conexion->cerrar();
    }

    function modificarTelefono($nuevoTelefono){
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->administradorDAO->modificarTelefono($nuevoTelefono));
        $this->conexion->cerrar();
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
    
    function inhabilitarUsuario($estado){
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->administradorDAO->inhabilitarUsuario($estado));
        $this->conexion->cerrar();
    }

    function eliminarComun(){
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->administradorDAO->eliminarComun());
        $this->conexion->cerrar();
    }

}

?>