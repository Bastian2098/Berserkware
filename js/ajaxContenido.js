$(document).ready(function(){

    $("#editButtonNombre").click(function(){
        $("#editNombre").css("display","block");
    });

    $("#editarNombre").click(function(){
        $.post(
            "presentacion/editarPerfil.php",
            {
                id: $(".contenidoPerfil").attr("id"),
                nuevoNombre: $("#editInputNombre").val(),
                accion: $("#editarNombre").attr("name"),
                rol: $(".contenidoPerfil").attr("name")
            },
            function(){
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'El nombre ha sido cambiado',
                    showConfirmButton: false,
                    timer: 1500
                }).then(function () {
                    $(".contenidoUsuario").load("presentacion/contenidoPerfil.php?user="+$(".contenidoUsuario").attr("id")+"&rol="+$(".contenidoUsuario").attr("name"));
                });
            }
        )
    })

    $("#editButtonCc").click(function(){
        $("#editCc").css("display","block");
    });

    $("#editarCc").click(function(){
        $.post(
            "presentacion/editarPerfil.php",
            {
                id: $(".contenidoPerfil").attr("id"),
                nuevoCc: $("#editInputCc").val(),
                accion: $("#editarCc").attr("name"),
                rol: $(".contenidoPerfil").attr("name")
            },
            function(){
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'El numero de identifiacion ha sido cambiado ha sido cambiado',
                    showConfirmButton: false,
                    timer: 1500
                }).then(function () {
                    $(".contenidoUsuario").load("presentacion/contenidoPerfil.php?user="+$(".contenidoUsuario").attr("id")+"&rol="+$(".contenidoUsuario").attr("name"));
                });
            }
        )
    })

    $("#editButtonDireccion").click(function(){
        $("#editDireccion").css("display","block");
    });

    $("#editarDireccion").click(function(){
        $.post(
            "presentacion/editarPerfil.php",
            {
                id: $(".contenidoPerfil").attr("id"),
                nuevoDireccion: $("#editInputDireccion").val(),
                accion: $("#editarDireccion").attr("name"),
                rol: $(".contenidoPerfil").attr("name")
            },
            function(){
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'La direccion ha sido cambiada',
                    showConfirmButton: false,
                    timer: 1500
                }).then(function () {
                    $(".contenidoUsuario").load("presentacion/contenidoPerfil.php?user="+$(".contenidoUsuario").attr("id")+"&rol="+$(".contenidoUsuario").attr("name"));
                });
            }
        )
    })

    $("#editButtonTelefono").click(function(){
        $("#editTelefono").css("display","block");
    });

    $("#editarTelefono").click(function(){
        $.post(
            "presentacion/editarPerfil.php",
            {
                id: $(".contenidoPerfil").attr("id"),
                nuevoTelefono: $("#editInputTelefono").val(),
                accion: $("#editarTelefono").attr("name"),
                rol: $(".contenidoPerfil").attr("name")
            },
            function(){
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'El telefono ha sido cambiado',
                    showConfirmButton: false,
                    timer: 1500
                }).then(function () {
                    $(".contenidoUsuario").load("presentacion/contenidoPerfil.php?user="+$(".contenidoUsuario").attr("id")+"&rol="+$(".contenidoUsuario").attr("name"));
                });
            }
        )
    })

})