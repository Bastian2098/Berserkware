$(document).ready(function () {

    const inputs = document.querySelectorAll("#formRegistrar input");

    const expresiones = {
        nombre: /^[a-zA-ZÀ-ÿ\s]{1,40}$/, // Letras y espacios, pueden llevar acentos.
        password: /^.{8,16}$/, // 8 a 16 digitos.
        correo: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
        telefono: /^\d{7,14}$/, // 7 a 14 numeros.
        cc: /^\d{5,10}$/, // 5 a 10 numeros.
        direccion: /^.{16,60}$/
    }

    const campos = {
        nombre: false,
        correo: false,
        telefono: false,
        cc: false,
        direccion: false,
        contraseña: false
    }

    const validarForm = (e) => {
        switch (e.target.name) {
            case "nombre":
                validarInput(expresiones.nombre, e.target, "nombre");
                break;
            case "cc":
                validarInput(expresiones.cc, e.target, "cc");
                break;
            case "correo":
                validarInput(expresiones.correo, e.target, "correo");
                break;
            case "telefono":
                validarInput(expresiones.telefono, e.target, "telefono");
                break;
            case "direccion":
                validarInput(expresiones.direccion, e.target, "direccion");
                break;
            case "contraseña":
                validarInput(expresiones.password, e.target, "contraseña");
                validarPass();
                break;
            case "contraseña2":
                validarPass();
                break;
        }
    }

    const validarPass = () => {
        const inputPassword = document.getElementById("contraseña");
        const inputPasswordR = document.getElementById("contraseña2");
        if (inputPassword.value !== inputPasswordR.value) {
            document.getElementById("contraseña2U").classList.add("inputU-incorrect");
            document.getElementById("contraseña2U").classList.remove("inputU-correct");
            document.querySelector("#contraseña2U i").classList.add("fa-times")
            document.querySelector("#contraseña2U i").classList.remove("fa-check");
            document.querySelector(`#contraseña2U .errorMsg`).classList.add("errorMsg-active");
            campos["contraseña"] = false;
        } else {
            document.getElementById("contraseña2U").classList.remove("inputU-incorrect");
            document.getElementById("contraseña2U").classList.add("inputU-correct");
            document.querySelector("#contraseña2U i").classList.remove("fa-times")
            document.querySelector("#contraseña2U i").classList.add("fa-check");
            document.querySelector(`#contraseña2U .errorMsg`).classList.remove("errorMsg-active");
            campos["contraseña"] = true;
        }
    }

    const validarInput = (expresion, input, campo) => {
        if (expresion.test(input.value)) {
            document.getElementById(`${campo}U`).classList.remove("inputU-incorrect");
            document.getElementById(`${campo}U`).classList.add("inputU-correct");
            document.querySelector(`#${campo}U i`).classList.add("fa-check")
            document.querySelector(`#${campo}U i`).classList.remove("fa-times");
            document.querySelector(`#${campo}U .errorMsg`).classList.remove("errorMsg-active");
            campos[campo] = true;
        } else {
            document.getElementById(`${campo}U`).classList.add("inputU-incorrect");
            document.getElementById(`${campo}U`).classList.remove("inputU-correct");
            document.querySelector(`#${campo}U i`).classList.add("fa-times")
            document.querySelector(`#${campo}U i`).classList.remove("fa-check");
            campos[campo] = false;
            document.querySelector(`#${campo}U .errorMsg`).classList.add("errorMsg-active");
        }
    }

    inputs.forEach((input) => {
        input.addEventListener("keyup", validarForm);
        input.addEventListener("blur", validarForm);
    });

    $("#registrar").click(function () {
        if (campos.nombre && campos.cc && campos.correo && campos.telefono && campos.direccion && campos.contraseña) {
            var data = { nombre: $("#nombre").val(), cc: $("#cc").val(), correo: $("#correo").val(), telefono: $("#telefono").val(), direccion: $("#direccion").val(), contraseña: $("#contraseña").val() }
            $.post(
                "presentacion/registrar.php",
                {
                    data: data
                },
                function () {
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
        } else {
            $(".errorMsgFull").addClass("errorMsgFull-active");
        }
    })

    $(".iconoEstado").click(function () {
        $.get(
            "presentacion/cambiarEstado.php",
            {
                id: $(this).attr("id")
            },
            function () {
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'El estado ha sido cambiado',
                    showConfirmButton: false,
                    timer: 1500
                }).then(function () {
                    location.reload();
                });
            }
        )
    })

    $("#modificar").click(function () {
        $.post(
            "presentacion/cambiarUsuario.php",
            {
                id: $("#listUsers option:selected").attr("id"),
                nit: $("#nit").val(),
                numTarj: $("#numTarj").val(),
            },
            function () {
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'El tipo de usuario ha sido cambiado',
                    showConfirmButton: false,
                    timer: 1500
                }).then(function () {
                    location.reload();
                });
            }
        )
    })

    $("#contPro").click(function(){
        $(".contenidoUsuario").load("presentacion/contenidoProducto.php?user="+$(".contenidoUsuario").attr("id")+"&rol="+$(".contenidoUsuario").attr("name"));
    })

    $("#contPer").click(function(){
        $(".contenidoUsuario").load("presentacion/contenidoPerfil.php?user="+$(".contenidoUsuario").attr("id")+"&rol="+$(".contenidoUsuario").attr("name"));
    })

    $("#contCar").click(function(){
        $(".contenidoUsuario").load("presentacion/contenidoCarrito.php?user="+$(".contenidoUsuario").attr("id")+"&rol="+$(".contenidoUsuario").attr("name"));
    })
    
});