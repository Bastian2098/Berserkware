<?php

require_once "conexion.php";

class UsuarioMayoristaDAO{

    private $id;
    private $nombre;
    private $cc;
    private $telefono;
    private $direccion;
    private $correo;
    private $contraseña;
    private $nit;
    private $numTarjeta;

    public function UsuarioMayoristaDAO($_id, $_nombre, $_cc, $_telefono, $_direccion, $_correo, $_contraseña, $_nit, $_numTarjeta){
        $this->id = $_id;
        $this->nombre = $_nombre;
        $this->cc = $_cc;
        $this->telefono = $_telefono;
        $this->direccion = $_direccion;
        $this->correo = $_correo;
        $this->contraseña = $_contraseña;
        $this->nit = $_nit;
        $this->numTarjeta = $_numTarjeta;
    }

    function autenticar(){
        return "select ID_USUARIO from Usuario where correo = '".$this->correo."' AND contraseña = '".$this->contraseña."'";
    }

    function consultarMayorista(){
        return "select ID_USUARIO_FK from Mayorista where ID_USUARIO_FK = '".$this->id."'";
    }

    function consultarUsuario(){
        return "select nombre from Usuario where ID_USUARIO = '".$this->id."'";
    }

    function consultarTodo(){
        return "select nombre, cc, direccion, telefono from Usuario where ID_USUARIO = '".$this->id."'";
    }

    function modificarUsuario(){
        return null;
    }

    function modificarNombre($nuevoNombre){
        return "update Usuario set nombre = '".$nuevoNombre."' where ID_USUARIO = '".$this->id."'";
    }

    function modificarCc($nuevoCc){
        return "update Usuario set cc = '".$nuevoCc."' where ID_USUARIO = '".$this->id."'";
    }

    function modificarDireccion($nuevoDireccion){
        return "update Usuario set direccion = '".$nuevoDireccion."' where ID_USUARIO = '".$this->id."'";
    }

    function modificarTelefono($nuevoTelefono){
        return "update Usuario set telefono = '".$nuevoTelefono."' where ID_USUARIO = '".$this->id."'";
    }

    function crearUsuario(){
        return "insert into Usuario (contraseña, cc, direccion, correo, nombre, telefono, nit, numTarjeta) values ('".$this->contraseña."', '".$this->cc."', '".$this->direccion."', '".$this->correo."', '".$this->nombre."','".$this->telefono.", '".$this->nit."','".$this->numTarjeta."')";
    }

    function asignarMayorista(){
        return "insert into Mayorista (ID_USUARIO_FK, NIT, numTarjeta) values ('".$this->id."', '".$this->nit."', '".$this->numTarjeta."')";
    }

    function consultarIDUsuario(){
        return "select ID_USUARIO from Usuario where cc = '".$this->cc."'";
    }

    function inhabilitarUsuario(){
        return null;
    }

}

?>