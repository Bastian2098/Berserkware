<?php

require_once("../dirs.php");
require(LOGIC_PATH."usuarioComun.php");

if(isset($_POST["data"])){
    $usuario = new UsuarioComun("", $_POST["data"]["nombre"], $_POST["data"]["cc"], $_POST["data"]["telefono"], $_POST["data"]["direccion"], $_POST["data"]["correo"], $_POST["data"]["contraseña"]);
    $usuario -> crearUsuario();
    $usuario -> consultarIDUsuario();
    $usuario -> asignarTipoUsuario();
    header("Location: ../index.php");
}

?>