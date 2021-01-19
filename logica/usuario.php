<?php

abstract class Usuario{

    protected $id;
    protected $nombre;
    protected $cc;
    protected $telefono;
    protected $direccion;
    protected $correo;
    protected $contraseña;
    
    abstract public function autenticar();
    abstract public function consultarUsuario();
    abstract public function modificarUsuario();
    abstract public function crearUsuario();
    abstract public function inhabilitarUsuario();
    abstract public function asignarTipoUsuario();

}

?>