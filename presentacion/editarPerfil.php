<?php

require_once("../dirs.php");
require(LOGIC_PATH."usuarioComun.php");
require(LOGIC_PATH."usuarioMayorista.php");
require(LOGIC_PATH."administrador.php");
require(LOGIC_PATH."log.php");

switch ($_POST["rol"]) {
  case "Administrador":
    $usuarioActual = new Administrador($_POST["id"], "", "", "", "", "", "");
    $usuarioActual->consultarNombre();
    break;
  case "Comun":
    $usuarioActual = new usuarioComun($_POST["id"], "", "", "", "", "", "");
    $usuarioActual->consultarUsuario();
    break;
  case "Mayorista":
    $usuarioActual = new usuarioMayorista($_POST["id"], "", "", "", "", "", "", "", "");
    $usuarioActual->consultarUsuario();
    break;
}

switch($_POST["accion"]){
    case "nombre":
        $log = new Log("", "El usuario ".$usuarioActual->getNombre()." ha cambiado su nombre", $usuarioActual->getId(), date("Y-m-d"));
        $log->insertarActividad();
        $usuarioActual->modificarNombre($_POST["nuevoNombre"]);
        break;
    case "cc":
        $log = new Log("", "El usuario ".$usuarioActual->getNombre()." ha cambiado su numero de documento", $usuarioActual->getId(), date("Y-m-d"));
        $log->insertarActividad();
        $usuarioActual->modificarCc($_POST["nuevoCc"]);
        break;
    case "direccion":
        $log = new Log("", "El usuario ".$usuarioActual->getNombre()." ha cambiado su direccion", $usuarioActual->getId(), date("Y-m-d"));
        $log->insertarActividad();
        $usuarioActual->modificarDireccion($_POST["nuevoDireccion"]);
        break;
    case "telefono":
        $log = new Log("", "El usuario ".$usuarioActual->getNombre()." ha cambiado su numero de telefono", $usuarioActual->getId(), date("Y-m-d"));
        $log->insertarActividad();
        $usuarioActual->modificarTelefono($_POST["nuevoTelefono"]);
        break;
}

?>