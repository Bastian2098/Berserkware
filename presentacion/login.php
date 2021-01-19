<body>
    <header class="header">
        <?php

        include './presentacion/navprincipal.php';

        ?>
    </header>
    <div class="container">
        <div class="row justify-content-center pt-5 mt-5">
            <div class="col-md-4 formulario">
                <form action=<?php echo "index.php?id=presentacion/autenticar.php"; ?> method="POST">
                    <div class="form-group text-center">
                        <h1 class="text-light">Iniciar Sesión</h1>
                    </div>
                    <div class="mb-3 pt-3">
                        <input type="email" class="form-control" name="correo" placeholder="Usuario ">
                    </div>
                    <div class="mb-3 pt-3">
                        <input type="password" class="form-control" name="contraseña" placeholder="Contraseña">
                    </div>
                    <div class="mb-3 pt-3">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input recordar" id="dropdownCheck2">
                            <label class="form-check-label text-light" for="dropdownCheck2">
                                Remember me
                            </label>
                        </div>
                    </div>
                    <div class="form-group text-center pt-3 ">
                        <input type="submit" value="Ingresar" class="btn btn-block ingresar">
                    </div>
                </form>
                <div class="form-group text-center pt-3">
                    <button type="button" class="btn btn-primary btn-dark" data-bs-toggle="modal" data-bs-target="#exampleModal">
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
                    <h5 class="modal-title text-center" id="exampleModalLabel">Registrar</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                <form method="POST" id="formRegistrar">
                    <div class="modal-body modal1">
                        <div class="mb-3 pt-3">
                            <input type="text" class="form-control" id="nombre" placeholder="Nombre">
                        </div>
                        <div class="mb-3 pt-3">
                            <input type="text" class="form-control" id="cc" placeholder="Identificación">
                        </div>
                        <div class="mb-3 pt-3">
                            <input type="mail" class="form-control" id="correo" placeholder="Correo">
                        </div>
                        <div class="mb-3 pt-3">
                            <input type="text" class="form-control" id="telefono" placeholder="Telefono">
                        </div>
                        <div class="mb-3 pt-3">
                            <input type="text" class="form-control" id="direccion" placeholder="Direccion">
                        </div>
                        <div class="mb-3 pt-3">
                            <input type="password" class="form-control" id="contraseña" placeholder="Contraseña">
                        </div>
                        <!--<div class="mb-3 pt-3">
                            <input type="password" class="form-control" id="contraseña2" placeholder="Repetir contraseña">
                        </div>-->
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="registrar" class="btn btn-primary boton_registro">Registrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>