const ChangeStatusUsuario = (obj) => {
    let idUsuario = obj.id;
    let estatus = $(`#${idUsuario}`).prop("checked") ? 1 : 0;
    Swal.fire({
        icon: "question",
        text: "¿Estás seguro de cambiar el estatus?",
        showCancelButton: true,
        confirmButtonColor: "#521a49",
        cancelButtonColor: "#dc3545",
        confirmButtonText: "Si, Continuar",
        cancelButtonText: "Cancelar",
        width: 400,
    }).then((result) => {
        if (result.isConfirmed) {
            validChangeStatusUsuario(idUsuario, estatus);
        } else {
            $(`#${idUsuario}`).prop("checked", !estatus);
        }
    });
};

const validChangeStatusUsuario = (id, estatus) => {
    axios
        .put("/usuarios/estatus/editar", { id: id, estatus: estatus })
        .then(function ({ data }) {
            let { stats } = data;
            if (stats.status == "success") {
                toastr.success("El estatus se ha cambiado.");
            } else {
                toastr.error(stats.message);
                $(`#${id}`).prop("checked", !estatus);
            }
        })
        .catch(function (e) {
            toastr.error("Error del servidor.");
        });
};

const DeleteUsuario = (obj) => {
    Swal.fire({
        title: "¿Estás seguro de realizar esta acción?",
        html: "Se eliminará el usuario permanentemente.",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#521a49",
        cancelButtonColor: "#dc3545",
        confirmButtonText: "Si, Continuar",
        cancelButtonText: "Cancelar",
        width: 400,
    }).then((result) => {
        if (result.isConfirmed) {
            ActionDeleteUsuario(obj.id);
        }
    });
};

const ActionDeleteUsuario = (id) => {
    axios
        .delete("/usuarios/eliminar", { params: { id: id } })
        .then(function ({ data }) {
            let { stats } = data;
            if (stats.status == "success") {
                alertDefault("¡Exito!", stats.message, "success", "/usuarios");
            } else {
                alertDefault("¡Error!", stats.message, "error");
            }
        })
        .catch(function (error) {
            alertDefault("¡Error!", "error del servidor", "error");
        });
};

const FormCreateUsuario = async () => {
    let validate = await validateFormUsuario();
    if (!validate) {
        toastr.error("Campos Obligatorios.");
        return;
    }
    alertLoading(true);

    let form = $("#FormCreateUsuario")[0];
    let formaData = new FormData(form);
    axios
        .post("/usuarios/crear", formaData)
        .then(function ({ data }) {
            alertLoading(false);
            let { stats, responseData } = data;
            if (stats.status == "success") {
                alertDefault(
                    "¡Exito!",
                    stats.message,
                    "success",
                    "/usuarios/editar/" + responseData.id
                );
            } else {
                alertDefault("¡Error!", stats.message, "error");
            }
        })
        .catch(function (error) {
            alertLoading(false);
            alertDefault("¡Error!", "error del servidor", "error");
        });
};

const validateFormUsuario = () => {
    let bandera = true;
    let nombre = $("#nombre").val();
    let domicilio = $("#domicilio").val();
    let ciudad = $("#ciudad").val();
    let telefono = $("#telefono").val();
    let celular = $("#celular").val();
    let email = $("#email").val();
    let usuario = $("#usuario").val();
    let password = $("#password").val();
    let passwordRepetir = $("#password-repetir").val();

    if (nombre == "" || nombre.length < 5) {
        $("#advertencia-nombre").html("* Obligatorio");
        $("#nombre").addClass("form-control-danger");
        bandera = false;
    } else {
        $("#advertencia-nombre").html("");
        $("#nombre").removeClass("form-control-danger");
    }
    if (domicilio == "" || domicilio.length < 5) {
        $("#advertencia-domicilio").html("* Obligatorio");
        $("#domicilio").addClass("form-control-danger");
        bandera = false;
    } else {
        $("#advertencia-domicilio").html("");
        $("#domicilio").removeClass("form-control-danger");
    }
    if (ciudad == "" || ciudad.length < 5) {
        $("#advertencia-ciudad").html("* Obligatorio");
        $("#ciudad").addClass("form-control-danger");
        bandera = false;
    } else {
        $("#advertencia-ciudad").html("");
        $("#ciudad").removeClass("form-control-danger");
    }
    if (!ValidatarEmail(email)) {
        $("#advertencia-email").html("* Email no valido");
        $("#email").addClass("form-control-danger");
        bandera = false;
    } else {
        $("#advertencia-email").html("");
        $("#email").removeClass("form-control-danger");
    }
    if (telefono == "" || telefono.length < 8) {
        $("#advertencia-telefono").html("* Obligatorio");
        $("#telefono").addClass("form-control-danger");
        bandera = false;
    } else {
        $("#advertencia-telefono").html("");
        $("#telefono").removeClass("form-control-danger");
    }
    if (celular == "" || celular.length < 10) {
        $("#advertencia-celular").html("* Obligatorio");
        $("#celular").addClass("form-control-danger");
        bandera = false;
    } else {
        $("#advertencia-celular").html("");
        $("#celular").removeClass("form-control-danger");
    }
    if (usuario == "" || usuario.length < 5) {
        $("#advertencia-usuario").html("* Obligatorio");
        $("#usuario").addClass("form-control-danger");
        bandera = false;
    } else {
        $("#advertencia-usuario").html("");
        $("#usuario").removeClass("form-control-danger");
    }
    if (password == "" || password.length < 5) {
        $("#advertencia-password").html("* Obligatorio");
        $("#password").addClass("form-control-danger");
        bandera = false;
    } else {
        $("#advertencia-password").html("");
        $("#password").removeClass("form-control-danger");
    }
    if (passwordRepetir == "" || passwordRepetir.length < 5) {
        $("#advertencia-password-repetir").html("* Obligatorio");
        $("#password-repetir").addClass("form-control-danger");
        bandera = false;
    } else {
        $("#advertencia-password-repetir").html("");
        $("#password-repetir").removeClass("form-control-danger");
    }
    return bandera;
};

const mostrarPassword = () => {
    var cambio = document.getElementById("password");
    if (cambio.type == "password") {
        cambio.type = "text";
        $("#icon_password")
            .removeClass("fa fa-eye-slash")
            .addClass("fa fa-eye");
    } else {
        cambio.type = "password";
        $("#icon_password")
            .removeClass("fa fa-eye")
            .addClass("fa fa-eye-slash");
    }
};

const mostrarPasswordRepetir = () => {
    var cambio = document.getElementById("password-repetir");
    if (cambio.type == "password") {
        cambio.type = "text";
        $("#icon_password_repetir")
            .removeClass("fa fa-eye-slash")
            .addClass("fa fa-eye");
    } else {
        cambio.type = "password";
        $("#icon_password_repetir")
            .removeClass("fa fa-eye")
            .addClass("fa fa-eye-slash");
    }
};

const FormEditUsuarioGeneral = async () => {
    let validate = await validateFormEditUsuarioGeneral();
    if (!validate) {
        toastr.error("Campos Obligatorios.");
        return;
    }
    alertLoading(true);
    let form = $("#FormEditUsuarioGeneral")[0];
    let formaData = new FormData(form);
    axios
        .post("/usuarios/editar/general", formaData)
        .then(function ({ data }) {
            alertLoading(false);
            let { stats, responseData } = data;
            if (stats.status == "success") {
                alertDefault(
                    "¡Exito!",
                    stats.message,
                    "success",
                    "/usuarios/editar/" + responseData.id
                );
            } else {
                alertDefault("¡Error!", stats.message, "error");
            }
        })
        .catch(function (error) {
            alertLoading(false);
            alertDefault("¡Error!", "error del servidor", "error");
        });
};

const validateFormEditUsuarioGeneral = () => {
    let bandera = true;
    let nombre = $("#nombre").val();
    let domicilio = $("#domicilio").val();
    let ciudad = $("#ciudad").val();
    let telefono = $("#telefono").val();
    let celular = $("#celular").val();
    let email = $("#email").val();
    if (nombre == "" || nombre.length < 5) {
        $("#advertencia-nombre").html("* Obligatorio");
        $("#nombre").addClass("form-control-danger");
        bandera = false;
    } else {
        $("#advertencia-nombre").html("");
        $("#nombre").removeClass("form-control-danger");
    }
    if (domicilio == "" || domicilio.length < 5) {
        $("#advertencia-domicilio").html("* Obligatorio");
        $("#domicilio").addClass("form-control-danger");
        bandera = false;
    } else {
        $("#advertencia-domicilio").html("");
        $("#domicilio").removeClass("form-control-danger");
    }
    if (ciudad == "" || ciudad.length < 5) {
        $("#advertencia-ciudad").html("* Obligatorio");
        $("#ciudad").addClass("form-control-danger");
        bandera = false;
    } else {
        $("#advertencia-ciudad").html("");
        $("#ciudad").removeClass("form-control-danger");
    }
    if (!ValidatarEmail(email)) {
        $("#advertencia-email").html("* Email no valido");
        $("#email").addClass("form-control-danger");
        bandera = false;
    } else {
        $("#advertencia-email").html("");
        $("#email").removeClass("form-control-danger");
    }
    if (telefono == "" || telefono.length < 8) {
        $("#advertencia-telefono").html("* Obligatorio");
        $("#telefono").addClass("form-control-danger");
        bandera = false;
    } else {
        $("#advertencia-telefono").html("");
        $("#telefono").removeClass("form-control-danger");
    }
    if (celular == "" || celular.length < 10) {
        $("#advertencia-celular").html("* Obligatorio");
        $("#celular").addClass("form-control-danger");
        bandera = false;
    } else {
        $("#advertencia-celular").html("");
        $("#celular").removeClass("form-control-danger");
    }
    return bandera;
};

const openModalFoto = async () => {
    let id = $("#id_usuario").val();
    let img = await axios("/usuarios/imagen/" + id)
        .then(function ({ data }) {
            let { responseData } = data;
            return responseData.imagen;
        })
        .catch(function (error) {
            return "";
        });
    if (img) {
        $("#img-foto").attr("src", img);
        $("#Medium-modal").modal("show");
    } else {
        toastr.info("No existe imagen.");
    }
};

$(function () {
    $("#FormCreateUsuario").on("submit", function (event) {
        event.preventDefault();
        FormCreateUsuario();
    });

    $("#FormEditUsuarioGeneral").on("submit", function (event) {
        event.preventDefault();
        FormEditUsuarioGeneral();
    });
});
