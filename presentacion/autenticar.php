<?php

require_once("./dirs.php");
require(LOGIC_PATH."usuarioComun.php");
require(LOGIC_PATH."usuarioMayorista.php");
require(LOGIC_PATH."administrador.php");

$correo = $_POST["correo"];
$contraseña = $_POST["contraseña"];

$administrador = new Administrador("", "", "", "", "", $correo, $contraseña);
$comun = new UsuarioComun("", "", "", "", "", $correo, $contraseña);
$mayorista = new UsuarioMayorista("", "", "", "", "", $correo, $contraseña, "", "");

if(($administrador->autenticar() == true) && ($administrador->consultarAdmin() == true)){
    $_SESSION["id"] = $administrador -> getId();
    $_SESSION["rol"] = "Administrador";
    header("Location: index.php?id=presentacion/sesion.php");
}else if(($comun->autenticar() == true) && ($comun->consultarComun() == true)){
    $_SESSION["id"] = $comun -> getId();
    $_SESSION["rol"] = "Comun";
    header("Location: index.php?id=presentacion/sesion.php");
}else if(($mayorista->autenticar() == true) && ($mayorista->consultarMayorista() == true)){
    $_SESSION["id"] = $mayorista -> getId();
    $_SESSION["rol"] = "Mayorista";
    header("Location: index.php?id=presentacion/sesion.php");
}

?>