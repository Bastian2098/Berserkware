<?php

$error = 0;
if (isset($_GET["error"])) {
    $error = $_GET["error"];
}

?>

<body>
    <header class="header">
        <?php

        include './presentacion/navprincipal.php';

        ?>
    </header>
    <div class="container">
        <div class="row justify-content-center pt-5 mt-5">
            <div class="col-md-4 formulario">
                <form action=<?php echo "index.php?id=presentacion/autenticar.php"; ?> method="POST" id="formLogin">
                    <div class="form-group text-center">
                        <h1 class="text-light">Iniciar sesión</h1>
                    </div>
                    <?php if($error == 1){ ?>
                    <div class="errorMsgLogin">
                        <p>
                            <i class="fas fa-exclamation"></i>
                            Correo o contraseña incorrecta.
                        </p>
                    </div>
                    <?php } ?>
                    <div class="mb-3 pt-3">
                        <input type="email" class="form-control" name="correoLogin" placeholder="Correo" required="required">
                    </div>
                    <div class="mb-3 pt-3">
                        <input type="password" class="form-control" name="contraseñaLogin" placeholder="Contraseña" required="required">
                    </div>
                    <div class="mb-3 pt-3">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input recordar" id="dropdownCheck2">
                            <label class="form-check-label text-light" for="dropdownCheck2">
                                Remember me
                            </label>
                        </div>
                    </div>
                    <div class="form-group text-center pt-3">
                        <input type="submit" value="Ingresar" class="btn btn-block ingresar" id="login">
                    </div>
                </form>
                <div class="form-group text-center pt-3">
                    <button type="button" class="btn btn-primary btn-dark" data-bs-toggle="modal" data-bs-target="#exampleModal" id="buttonReg">
                        Registrar
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <i class="fas fa-clipboard-list fa-2x" style="color: white"></i>
                    <h5 class="modal-title text-center" id="exampleModalLabel" style="margin-left:10px">Registrar</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                <form method="POST" id="formRegistrar">
                    <div class="modal-body modal1">
                        <div class="mb-3 pt-3 inputU" id="nombreU">
                            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre">
                            <i class="fas fa-times iconoCheck"></i>
                            <p class="errorMsg">El nombre solo debe estar formado por letras.</p>
                        </div>
                        <div class="mb-3 pt-3 inputU" id="ccU">
                            <input type="text" class="form-control" id="cc" name="cc" placeholder="Identificación">
                            <i class="fas fa-times iconoCheck"></i>
                            <p class="errorMsg">El número de identificación debe tener de 5 a 10 dígitos.</p>
                        </div>
                        <div class="mb-3 pt-3 inputU" id="correoU">
                            <input type="mail" class="form-control" id="correo" name="correo" placeholder="Correo">
                            <i class="fas fa-times iconoCheck"></i>
                            <p class="errorMsg">Este correo electrónico no es válido.</p>
                        </div>
                        <div class="mb-3 pt-3 inputU" id="telefonoU">
                            <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Telefono">
                            <i class="fas fa-times iconoCheck"></i>
                            <p class="errorMsg">El teléfono debe tener de 7 a 10 dígitos.</p>
                        </div>
                        <div class="mb-3 pt-3 inputU" id="direccionU">
                            <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Direccion">
                            <i class="fas fa-times iconoCheck"></i>
                            <p class="errorMsg">La dirección física debe tener al menos 16 carácteres.</p>
                        </div>
                        <div class="mb-3 pt-3 inputU" id="contraseñaU">
                            <input type="password" class="form-control" id="contraseña" name="contraseña" placeholder="Contraseña">
                            <i class="fas fa-times iconoCheck"></i>
                            <p class="errorMsg">La contraseña debe tener entre 8 a 16 carácteres.</p>
                        </div>
                        <div class="mb-3 pt-3 inputU" id="contraseña2U">
                            <input type="password" class="form-control" id="contraseña2" name="contraseña2" placeholder="Repetir contraseña">
                            <i class="fas fa-times iconoCheck"></i>
                            <p class="errorMsg">Ambas contraseñas deben coincidir.</p>
                        </div>
                    </div>
                    <div class="errorMsgFull">
                        <p>
                            <i class="fas fa-exclamation"></i>
                            Faltan o hay datos datos erróneos para el registro.
                        </p>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" id="registrar" class="btn btn-primary boton_registro">Registrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>