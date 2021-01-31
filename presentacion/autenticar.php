<?php

require_once("./dirs.php");
require(LOGIC_PATH . "usuarioComun.php");
require(LOGIC_PATH . "usuarioMayorista.php");
require(LOGIC_PATH . "administrador.php");
require(LOGIC_PATH."log.php");

$correo = $_POST["correoLogin"];
$contraseña = hash("sha256",$_POST["contraseñaLogin"]);

$administrador = new Administrador("", "", "", "", "", $correo, $contraseña);
$comun = new UsuarioComun("", "", "", "", "", $correo, $contraseña);
$mayorista = new UsuarioMayorista("", "", "", "", "", $correo, $contraseña, "", "");

if (($administrador->autenticar() == true) && ($administrador->consultarAdmin() == true)) {
    if($administrador->consultarEstado() == 0){
        $_SESSION["id"] = $administrador->getId();
        $_SESSION["rol"] = "Administrador";
        $administrador->consultarNombre();
        $log = new Log("", "El usuario ".$administrador->getNombre()." ha ingresado", $administrador->getId(), date("Y-m-d"));
        $log->insertarActividad();
        header("Location: index.php?id=presentacion/sesion.php");
    }else{
        header("Location: index.php?error=2");
        $administrador->consultarNombre();
        $log = new Log("", "El usuario ".$administrador->getNombre()." ha intentado ingresar",$administrador->getId(),date("d-m-Y"));
        $log->insertarActividad();
    }
} else if (($comun->autenticar() == true) && ($comun->consultarComun() == true)) {
    if($administrador->consultarEstado() == 0){
        $_SESSION["id"] = $comun->getId();
        $_SESSION["rol"] = "Comun";
        $comun->consultarUsuario();
        $log = new Log("", "El usuario ".$comun->getNombre()." ha intentado ingresar",$comun->getId(),date("d-m-Y"));
        $log->insertarActividad();
        header("Location: index.php?id=presentacion/sesion.php");
    }else{
        header("Location: index.php?error=2");
        $comun->consultarUsuario();
        $log = new Log("", "El usuario ".$comun->getNombre()." ha intentado ingresar",$comun->getId(),date("d-m-Y"));
        $log->insertarActividad();
    }
} else if (($mayorista->autenticar() == true) && ($mayorista->consultarMayorista() == true)) {
    if($administrador->consultarEstado() == 0){
        $_SESSION["id"] = $mayorista->getId();
        $_SESSION["rol"] = "Mayorista";
        header("Location: index.php?id=presentacion/sesion.php");
        $mayorista->consultarUsuario();
        $log = new Log("", "El usuario ".$mayorista->getNombre()." ha intentado ingresar",$mayorista->getId(),date("d-m-Y"));
        $log->insertarActividad();
    }else{
        header("Location: index.php?error=2");
        $mayorista->consultarUsuario();
        $log = new Log("", "El usuario ".$mayorista->getNombre()." ha intentado ingresar",$mayorista->getId(),date("d-m-Y"));
        $log->insertarActividad();
    }
} else {
    header("Location: index.php?error=1");
}

?>
