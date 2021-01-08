<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<link rel="stylesheet" href="presentacion/style.css">
<link rel="icon" type="image/png" href="img/img1.png">

</head>
<body>
<div class="container">
    <div class="row justify-content-center pt-5 mt-5">
        <div class="col-md-4 formulario">
            <form action="">
            <div class="form-group text-center">
                <h1 class="text-light">Iniciar Sesión</h1>
            </div>
            <div class="mb-3 pt-3">
    <input type="email" class="form-control" id="exampleDropdownFormEmail2" placeholder="Usuario ">
  </div>
  <div class="mb-3 pt-3">
    <input type="password" class="form-control" id="exampleDropdownFormPassword2" placeholder="Contraseña">
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
      <input type="submit" value="INGRESAR" class="btn btn-block ingresar">

     
  </div> 
  <div class="form-group text-center pt-3">
  <button type="button" class="btn btn-primary btn-dark" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Registrar
</button>

  </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body modal1">
      <div class="mb-3 pt-3">
    <input type="text" class="form-control" id="exampleDropdownFormEmail2" placeholder="Nmobre">
  </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary " data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary btn-success">Save changes</button>
      </div>
    </div>
  </div>
</div>
    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>
</html>