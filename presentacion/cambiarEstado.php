<?php

require_once("../dirs.php");
require(LOGIC_PATH . "administrador.php");

$idUsuario = $_GET["id"];
$usuario = new Administrador($idUsuario, "", "", "", "", "", "", "");
$usuario -> consultarEstado();
if($usuario -> getEstado() == 1){
    $usuario -> inhabilitarUsuario(0);
}else{
    $usuario -> inhabilitarUsuario(1);
}

?>