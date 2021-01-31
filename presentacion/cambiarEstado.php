<?php

require_once("../dirs.php");
require(LOGIC_PATH . "administrador.php");

$idUsuario = $_GET["id"];
$usuario = new Administrador($idUsuario, "", "", "", "", "", "", "");
$usuario -> consultarEstado();

if($usuario -> getEstado() == 1){
    $usuario -> inhabilitarUsuario(0);
    $usuario -> consultarNombre();
    $log = new Log("", "El usuario ".$usuario->getNombre()." ha sido habilitado", $usuario->getId(), date("Y-m-d"));
    $log->insertarActividad();
}else{
    $usuario -> inhabilitarUsuario(1);
    $usuario -> consultarNombre();
    $log = new Log("", "El usuario ".$usuario->getNombre()." ha sido deshabilitado", $usuario->getId(), date("Y-m-d"));
    $log->insertarActividad();
}

?>