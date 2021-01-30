<?php

require_once("./dirs.php");
require(LOGIC_PATH . "usuarioComun.php");
require(LOGIC_PATH . "usuarioMayorista.php");
require(LOGIC_PATH . "administrador.php");

$correo = $_POST["correoLogin"];
$contraseña = hash("sha256",$_POST["contraseñaLogin"]);

$administrador = new Administrador("", "", "", "", "", $correo, $contraseña);
$comun = new UsuarioComun("", "", "", "", "", $correo, $contraseña);
$mayorista = new UsuarioMayorista("", "", "", "", "", $correo, $contraseña, "", "");

if (($administrador->autenticar() == true) && ($administrador->consultarAdmin() == true)) {
    if($administrador->consultarEstado() == 0){
        $_SESSION["id"] = $administrador->getId();
        $_SESSION["rol"] = "Administrador";
        header("Location: index.php?id=presentacion/sesion.php");
    }else{
        header("Location: index.php?error=2");
    }
} else if (($comun->autenticar() == true) && ($comun->consultarComun() == true)) {
    if($administrador->consultarEstado() == 0){
        $_SESSION["id"] = $comun->getId();
        $_SESSION["rol"] = "Comun";
        header("Location: index.php?id=presentacion/sesion.php");
    }else{
        header("Location: index.php?error=2");
    }
} else if (($mayorista->autenticar() == true) && ($mayorista->consultarMayorista() == true)) {
    if($administrador->consultarEstado() == 0){
        $_SESSION["id"] = $mayorista->getId();
        $_SESSION["rol"] = "Mayorista";
        header("Location: index.php?id=presentacion/sesion.php");
    }else{
        header("Location: index.php?error=2");
    }
} else {
    header("Location: index.php?error=1");
}

?>
