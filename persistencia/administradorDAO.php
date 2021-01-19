<?php

require_once "conexion.php";

class AdministradorDAO{

    private $id;
    private $nombre;
    private $cc;
    private $telefono;
    private $direccion;
    private $correo;
    private $contraseña;

    public function AdministradorDAO($_id, $_nombre, $_cc, $_telefono, $_direccion, $_correo, $_contraseña){
        $this->id = $_id;
        $this->nombre = $_nombre;
        $this->cc = $_cc;
        $this->telefono = $_telefono;
        $this->direccion = $_direccion;
        $this->correo = $_correo;
        $this->contraseña = $_contraseña;
    }

    public function setId($_id){
        $this->id = $_id;
    }

    function autenticar(){
        return "select ID_USUARIO from Usuario where correo = '".$this->correo."' AND contraseña = '".$this->contraseña."'";
    }

    function consultarAdmin(){
        return "select ID_USUARIO_FK from Administrador where ID_USUARIO_FK = '".$this->id."'";
    }

    function consultarUsuario(){
        return "select nombre from Usuario where ID_USUARIO = '".$this->id."'";
    }

    function modificarUsuario(){
        return null;
    }

    function crearUsuario(){
        return "insert into Usuario (contraseña, cc, direccion, correo, nombre, telefono) values ('".$this->contraseña."', '".$this->cc."', '".$this->direccion."', '".$this->correo."', '".$this->nombre."','".$this->telefono."')";
    }

    function asignarUsuarioAdmin(){
        return "insert into Administrador (ID_USUARIO_FK) values ('".$this->id."')";
    }

    function consultarIDUsuario(){
        return "select ID_USUARIO from Usuario where cc = '".$this->cc."'";
    }

    function inhabilitarUsuario(){
        return null;
    }

}

?>