<?php

require_once("./dirs.php");
require(LOGIC_PATH."usuarioComun.php");
require(LOGIC_PATH."usuarioMayorista.php");
require(LOGIC_PATH."administrador.php");

switch ($_SESSION["rol"]) {
    case "Administrador":
        $usuarioActual = new Administrador($_SESSION["id"], "", "", "", "", "", "");
        break;
    case "Comun":
        $usuarioActual = new usuarioComun($_SESSION["id"], "", "", "", "", "", "");
        break;
    case "Mayorista":
        $usuarioActual = new usuarioMayorista($_SESSION["id"], "", "", "", "", "", "", "", "");
        break;
}

$usuarioActual->consultarUsuario();

?>

<h1>Bienvenido</h1><br>
Usuario: <?php echo $usuarioActual->getNombre(); ?>
<a href="index.php?sesion=0">Cerrar sesion</a>