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

<div class="d-flex">
        <div class="sidebar-container" class="bg-primary">
            <div class="logo">
                <h4 class="tittle">Berserkware</h4>
            </div>
            <div class="menu">
                <a href="#" class="d-block pt-5"><i class = "icon ion-md-tv mr-2 " > </i>Productos</a>
                 <a href="#"  class="d-block pt-5"><i class = "icon ion-md-cart" > </i>Carrito de compras</a>
                  <a href="#" class="d-block pt-5"><i class = "icon ion-md-person" > </i>Perfil</a>
                   <a href="#" class="d-block pt-5"> <i class = "icon ion-md-construct" > </i>Configuración</a>
                   <a href="#" class="d-block pt-5"> <i class = "icon ion-md-exit" > </i>Cerrar sesión</a>
                   
            </div>
        </div>
       
        <div class="w-100">
     <nav class="navbar navbar-light bg-light">
  <div class="container-fluid">
    <form class="d-flex">
      <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-search position-absotute" type="submit"><i class = "icon ion-md-search" > </i></button>
    </form>
  </div>
</nav>
            
             <div class="w-100">
            <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
        <img src="../img/carrusel1.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
        <img src="../img/carrusel2.jpg"class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
        <img src="../img/carrusel3.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
        <img src="../img/carrusel4.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
        <img src="../img/carrusel5.jpg" class="d-block w-100" alt="...">
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
        </div>
        <div class="content">
        <div class="w-100 ">
        <h4 class="products">Productos</h4>
        <div class="container">
        
        <div class="card publicidad">
          <img src="../img/card1.jpg" alt="">
          <h4>Las mejores marcas del mercado</h4>
          <p>Berserkware te ofrece las mejores marcas que existen en el mundo </p>
        </div>
        <div class="card publicidad">
          <img src="../img/card2.jpg" alt="">
          <h4>Productos de alta calidad</h4>
          <p>Berserkware ofrece los equipos mejor claificados a nivel global  </p>
        </div>
        <div class="card publicidad">
          <img src="../img/card3.jpg" alt="">
          <h4>Alta experiencia en productos de tecnología</h4>
          <p>Berserkware lleva mas de 25 años en el mercado  </p>
        </div>
        <h4 class="catalog">Catalogo de productos</h4>
        <div class="container">
        
           <div class="card ">
          <img src="../img/example.jpg" alt="">
          <h4 class="product">ingresear nombre del producto</h4>
          <h5 class="precio ">Ingresar</h5>
          <button class=" button btn-block"  data-toggle="modal" data-target="#exampleModalCenter"><span>Comprar</span></button>
        </div>
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
        </div>
        </div>
</div>
             </div>
        </div>
