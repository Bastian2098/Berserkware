$(document).ready(function () {
    $("#registrar").click(function () {
        var data = {nombre: $("#nombre").val(), cc: $("#cc").val(), correo: $("#correo").val(), telefono: $("#telefono").val(), direccion: $("#direccion").val(), contraseña: $("#contraseña").val()/*, contraseña2: $("#contraseña2").val()*/}
        $.post(
            "presentacion/registrar.php",
            {
                data: data
            },
            function(){
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Usuario registrado',
                    showConfirmButton: false,
                    timer: 2000
                }).then(function () {
                    $("#exampleModal").modal("hide")
                });
            }
        )
    })
})