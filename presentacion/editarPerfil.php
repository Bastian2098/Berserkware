<?php

require_once("../dirs.php");
require(LOGIC_PATH."usuarioComun.php");
require(LOGIC_PATH."usuarioMayorista.php");
require(LOGIC_PATH."administrador.php");

switch ($_POST["rol"]) {
  case "Administrador":
    $usuarioActual = new Administrador($_POST["id"], "", "", "", "", "", "");
    break;
  case "Comun":
    $usuarioActual = new usuarioComun($_POST["id"], "", "", "", "", "", "");
    break;
  case "Mayorista":
    $usuarioActual = new usuarioMayorista($_POST["id"], "", "", "", "", "", "", "", "");
    break;
}

switch($_POST["accion"]){
    case "nombre":
        $usuarioActual->modificarNombre($_POST["nuevoNombre"]);
        break;
    case "cc":
        $usuarioActual->modificarCc($_POST["nuevoCc"]);
        break;
    case "direccion":
        $usuarioActual->modificarDireccion($_POST["nuevoDireccion"]);
        break;
    case "telefono":
        $usuarioActual->modificarTelefono($_POST["nuevoTelefono"]);
        break;
}

?>