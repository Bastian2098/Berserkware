<?php

require_once("../dirs.php");
require(LOGIC_PATH."usuarioComun.php");
require(LOGIC_PATH."log.php");

if(isset($_POST["data"])){
    $usuario = new UsuarioComun("", $_POST["data"]["nombre"], $_POST["data"]["cc"], $_POST["data"]["telefono"], $_POST["data"]["direccion"], $_POST["data"]["correo"], hash("sha256",$_POST["data"]["contraseña"]));
    $usuario -> crearUsuario();
    $usuario -> consultarIDUsuario();
    $usuario -> asignarTipoUsuario();
    $log = new Log("", "Se ha registrado un nuevo usuario", $usuario->getId(), date("Y-m-d"));
    $log->insertarActividad();
    header("Location: ../index.php");
}

?>