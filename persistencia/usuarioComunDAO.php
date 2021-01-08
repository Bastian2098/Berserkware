<?php

class usuarioComunDAO{

    private $id;
    private $nombre;
    private $cc;
    private $telefono;
    private $direccion;
    private $correo;
    private $contraseña;

    public function Usuario($_id, $_nombre, $_cc, $_telefono, $_direccion, $_correo, $_contraseña){
        $this->id = $_id;
        $this->nombre = $_nombre;
        $this->cc = $_cc;
        $this->telefono = $_telefono;
        $this->direccion = $_direccion;
        $this->correo = $_correo;
        $this->contraseña = $_contraseña;
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