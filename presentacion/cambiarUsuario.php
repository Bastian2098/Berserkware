<?php

require_once("../dirs.php");
require(LOGIC_PATH . "administrador.php");
require(LOGIC_PATH . "usuarioMayorista.php");

$idUsuario = $_POST["id"];
$usuarioComun = new Administrador($idUsuario, "", "", "", "", "", "", "");
$usuarioComun->eliminarComun();
$usuarioMayorista = new UsuarioMayorista($idUsuario, "", "", "", "", "", "", $_POST["nit"], $_POST["numTarj"]);
$usuarioMayorista->asignarTipoUsuario();

?>