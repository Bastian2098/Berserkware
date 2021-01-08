<?php

$correo = $_POST["correo"];
$contraseña = $_POST["contraseña"];

$administrador = new Administrador("", "", "", "", "",$correo, $contraseña);

if($administrador -> autenticar()){
    $_SESSION["id"] = $administrador -> getId();
    //$respuesta = array("confirmacion" => "ok");
    //echo json_encode($respuesta);
}else{
    echo "No existe y no se logeo";    
}

?>