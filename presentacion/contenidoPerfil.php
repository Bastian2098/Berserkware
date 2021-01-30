<h1>Perfil</h1>

<?php 

require_once("../dirs.php");
require(LOGIC_PATH . "usuarioComun.php");
require(LOGIC_PATH . "usuarioMayorista.php");
require(LOGIC_PATH . "administrador.php");

switch ($_GET["rol"]) {
    case "Administrador":
      $usuarioActual = new Administrador($_GET["user"], "", "", "", "", "", "");
      break;
    case "Comun":
      $usuarioActual = new usuarioComun($_GET["user"], "", "", "", "", "", "");
      break;
    case "Mayorista":
      $usuarioActual = new usuarioMayorista($_GET["user"], "", "", "", "", "", "", "", "");
      break;
  }

  $usuarioActual->consultarTodo();

?>

<div name=<?php echo $_GET["rol"];?> id=<?php echo $_GET["user"];?> class="contenidoPerfil">
  <div class="edit">
    <b>Nombre: </b><?php echo $usuarioActual->getNombre() ; ?>
    <a id="editButtonNombre" type="button">Editar<i class="fas fa-edit"></i></a>
    <div id="editNombre">
      <input id="editInputNombre" type="text" class="form-control" name="editNombre">
      <button name="nombre" type="button" id="editarNombre" class="btn btn-primary boton_registro">Editar</button>
    </div>
  </div><br>
  <div>
    <b>CC: </b><?php echo $usuarioActual->getCc(); ?>
    <a id="editButtonCc" type="button">Editar<i class="fas fa-edit"></i>
    <div id="editCc">
      <input id="editInputCc" type="text" class="form-control" name="editCc">
      <button name="cc" type="button" id="editarCc" class="btn btn-primary boton_registro">Editar</button>
    </div>
  </div><br>
  <div>
    <b>Direccion: </b><?php echo $usuarioActual->getDireccion(); ?>
    <a id="editButtonDireccion" type="button">Editar<i class="fas fa-edit"></i>
    <div id="editDireccion">
      <input id="editInputDireccion" type="text" class="form-control" name="editDireccion">
      <button name="direccion" type="button" id="editarDireccion" class="btn btn-primary boton_registro">Editar</button>
    </div>
  </div><br>
  <div>
    <b>Telefono: </b><?php echo $usuarioActual->getTelefono(); ?>
    <a id="editButtonTelefono" type="button">Editar<i class="fas fa-edit"></i>
    <div id="editTelefono">
      <input id="editInputTelefono" type="text" class="form-control" name="editTelefono">
      <button name="telefono" type="button" id="editarTelefono" class="btn btn-primary boton_registro">Editar</button>
    </div>
  </div><br>
</div>
<script src="js/ajaxContenido.js"></script>
