<?php

require_once("./dirs.php");
require(LOGIC_PATH . "usuarioComun.php");
require(LOGIC_PATH . "usuarioMayorista.php");
require(LOGIC_PATH . "administrador.php");
require(LOGIC_PATH."log.php");

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

?>
<div class="d-flex">
  <div class="sidebar-container" class="bg-primary">
    <div class="logo">
      <h4 class="tittle">Berserkware</h4>
    </div>
    <div class="menu">
      <a id="contPro" type="button" class="d-block pt-5"><i class="icon ion-md-tv mr-2 "></i>Productos</a>
      <a id="contCar" type="button" class="d-block pt-5"><i class="icon ion-md-cart"></i>Carrito de compras</a>
      <a id="contPer" type="button" class="d-block pt-5"><i class="icon ion-md-person"></i>Perfil</a>
      <a href=<?php echo "index.php?sesion=0" ?> class="d-block pt-5"><i class="icon ion-md-exit"></i>Cerrar sesión</a>
    </div>
  </div>
  <div class="w-100">
    <nav class="navbar navbar-light bg-light">
      <div class="container-fluid">
        <form class="d-flex">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-search position-absotute" type="submit"><i class="icon ion-md-search"> </i></button>
        </form>
        <?php if ($_SESSION["rol"] == "Administrador") { ?>
          <a type="button" data-bs-toggle="modal" data-bs-target="#usersModal"><i class="fas fa-users-cog"></i></a>
          <a type="button" data-bs-toggle="modal" data-bs-target="#mayoristaModal"><i class="fas fa-people-arrows"></i></a>
          <a type="button" data-bs-toggle="modal" data-bs-target="#logModal"><i class="fas fa-stream"></i></a>
        <?php } ?>
      </div>
    </nav>
    <div class="w-100">
      <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="img/carrusel1.jpg" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="img/carrusel2.jpg" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="img/carrusel3.jpg" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="img/carrusel4.jpg" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="img/carrusel5.jpg" class="d-block w-100" alt="...">
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </a>
      </div>
      <?php
        echo "<div id='".$usuarioActual->getId()."' class='contenidoUsuario' name='".$_SESSION["rol"]."'>
              </div>"
      ?>
    </div>
  </div>
</div>
<div class="modal fade bd-example-modal-lg" id="usersModal" tabindex="-1" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <i class="fas fa-users fa-2x" style="color: white"></i>
        <h5 class="modal-title text-center" id="usersModalLabel" style="margin-left:10px">Lista de usuarios</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
      </div>
      <div class="modal-body modal1">
        <table class="table table-dark">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Nombre</th>
              <th scope="col">Correo</th>
              <th scope="col">Estado</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $usuarios = $usuarioActual->consultarUsuario();
            foreach ($usuarios as $usuario) {
              echo "<tr>
                      <td>" . $usuario->getId() . "</td>
                      <td>" . $usuario->getNombre() . "</td>
                      <td>" . $usuario->getCorreo() . "</td>
                      <td>
                        <div class='iconoEstado' id='" . $usuario->getId() . "'>
                          <a type='button'>
                            " . (($usuario->getEstado() == 0) ? "
                            <i id='0' class='fas fa-user-check' data-toggle='tooltip' title='Habilitado'></i>" : "
                            <i id='1' class='fas fa-user-times' data-toggle='tooltip' title='Deshabilitado'></i>") . "
                          </a>
                        </div>
                      </td>
                    </tr>";
            }
            ?>
          </tbody>
        </table>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>
<div class="modal fade bd-example-modal-lg" id="mayoristaModal" tabindex="-1" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <i class="fas fa-user-edit fa-2x" style="color: white"></i>
        <h5 class="modal-title text-center" id="usersModalLabel" style="margin-left:10px">Usuarios Mayoristas</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
      </div>
      <div class="modal-body modal1">
        <select id="listUsers" class="form-select" aria-label="Default select example">
          <option selected>Elija un usuario</option>
          <?php
          foreach($usuarios as $usuario){
            echo "<option id=".$usuario->getId().">".$usuario->getNombre()."</option>";
          }
          ?>
        </select>
        <div class="mb-3 pt-3 inputU" id="nitU">
          <input type="text" class="form-control" id="nit" name="nit" placeholder="NIT">
        </div>
        <div class="mb-3 pt-3 inputU" id="numTarU">
          <input type="text" class="form-control" id="numTarj" name="numTarj" placeholder="Numero de tarjeta">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" id="modificar" class="btn btn-primary boton_registro">Cambiar</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade bd-example-modal-lg" id="logModal" tabindex="-1" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <i class="fas fa-database fa-2x" style="color: white"></i>
        <h5 class="modal-title text-center" id="usersModalLabel" style="margin-left:10px">Registro de Actividades</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
      </div>
      <div class="modal-body modal1">
      <table class="table table-dark">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Actividad</th>
              <th scope="col">ID del Usuario</th>
              <th scope="col">Fecha</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $log = new Log();
            $actividades = $log->consultarLog();
            foreach ($actividades as $actividad) {
              echo "<tr>
                      <td>" . $actividad->getId() . "</td>
                      <td>" . $actividad->getActividad() . "</td>
                      <td>" . $actividad->getUsuario() . "</td>
                      <td>".$actividad->getFecha()."</td>
                    </tr>";
            }
            ?>
          </tbody>
        </table>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>