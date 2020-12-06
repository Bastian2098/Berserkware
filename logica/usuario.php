<?php

abstract class usuario{

    protected $id;
    protected $nombre;
    protected $cc;
    protected $telefono;
    protected $direccion;
    protected $correo;
    protected $contraseña;

    abstract protected function Usuario($_id="", $_nombre="", $_cc="", $_telefono="", $_direccion="", $_correo="", $_contraseña="");
    abstract protected function getId();
    abstract protected function getNombre();
    abstract protected function getCc();
    abstract protected function getTelefono();
    abstract protected function getDireccion();
    abstract protected function getCorreo();
    abstract protected function getContraseña();
    abstract protected function autenticar();
    abstract protected function consultarUsuario();
    abstract protected function modificarUsuario();
    abstract protected function crearUsuario();
    abstract protected function inhabilitarUsuario();

}

?>