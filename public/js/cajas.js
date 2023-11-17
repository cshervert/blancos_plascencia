const openModalCrearCaja = () => {
    $("#crear-caja-modal").modal("show");
};

const FormCreateCaja = async () => {
    let validate = await validateFormCaja();
    if (!validate) {
        toastr.error("Permisos Obligatorios.");
        return;
    }
    alertLoading(true);
    axios
        .post("/cajas/crear", $("#FormCreateCaja").serialize())
        .then(function ({ data }) {
            alertLoading(false);
            let { stats } = data;
            if (stats.status == "success") {
                alertDefault("¡Exito!", stats.message, "success", "/cajas");
            } else {
                alertDefault("¡Error!", stats.message, "error");
            }
        })
        .catch(function (error) {
            alertLoading(false);
            alertDefault("¡Error!", "error del servidor", "error");
        });
};

const validateFormCaja = () => {
    let bandera = true;
    let nombre = $("#nombre").val();
    let destinatarios = $("#destinatarios").val();
    let destinatariios_array = destinatarios.split(",");
    if (nombre == "" || nombre.length < 3) {
        $("#advertencia-nombre").html("* Obligatorio (mínimo 3 dígitos)");
        $("#nombre").addClass("form-control-danger");
        bandera = false;
    } else {
        $("#advertencia-nombre").html("");
        $("#nombre").removeClass("form-control-danger");
    }
    if (destinatariios_array.length > 0) {
        destinatariios_array.forEach(function (email) {
            if (!ValidatarEmail(email)) {
                $("#advertencia-destinatarios").html(
                    "* Algunos emails no son validos"
                );
                bandera = false;
                return;
            } else {
                $("#advertencia-destinatarios").html("");
            }
        });
    }
    return bandera;
};

const openModalEditarCaja = async (obj) => {
    let idUnidad = obj.id;
    let response = await axios("/cajas/editar/" + idUnidad)
        .then(function ({ data }) {
            let { stats, responseData } = data;
            if (stats.status == "success") {
                return responseData;
            } else {
                return null;
            }
        })
        .catch(function (error) {
            return null;
        });
    if (response) {
        console.log(response);
        $("#idEditar").val(response.id);
        $("#nombreEditar").val(response.nombre);
        $("#sucursalEditar")
            .select2()
            .val(response.id_sucursal)
            .trigger("change");
        $("#enviarEditar").prop("checked", response.enviar);
        $("#destinatariosEditar").tagsinput("removeAll");
        $("#destinatariosEditar").tagsinput("add", response.destinatarios);
        $("#activoEditar").select2().val(response.activo).trigger("change");
        $("#advertencia-destinatariosEditar").html("");
        $("#editar-caja-modal").modal("show");
    } else {
        toastr.error("Ocurrio un error.");
    }
};

const FormEditCaja = async () => {
    let validate = await validateFormEditCaja();
    if (!validate) {
        toastr.error("Campo Obligatorio.");
        return;
    }
    alertLoading(true);
    axios
        .put("/cajas/editar", $("#FormEditCaja").serialize())
        .then(function ({ data }) {
            alertLoading(false);
            let { stats } = data;
            if (stats.status == "success") {
                alertDefault("¡Exito!", stats.message, "success", "/cajas");
            } else {
                alertDefault("¡Error!", stats.message, "error");
            }
        })
        .catch(function (error) {
            alertLoading(false);
            alertDefault("¡Error!", "error del servidor", "error");
        });
};

const validateFormEditCaja = () => {
    let bandera = true;
    let nombre = $("#nombreEditar").val();
    let destinatarios = $("#destinatariosEditar").val();
    let destinatariios_array = destinatarios.split(",");
    if (nombre == "" || nombre.length < 3) {
        $("#advertencia-nombreEditar").html("* Obligatorio (mínimo 3 dígitos)");
        $("#nombreEditar").addClass("form-control-danger");
        bandera = false;
    } else {
        $("#advertencia-nombreEditar").html("");
        $("#nombreEditar").removeClass("form-control-danger");
    }
    if (destinatariios_array.length > 0) {
        destinatariios_array.forEach(function (email) {
            if (!ValidatarEmail(email)) {
                $("#advertencia-destinatariosEditar").html(
                    "* Algunos emails no son validos"
                );
                bandera = false;
                return;
            } else {
                $("#advertencia-destinatariosEditar").html("");
            }
        });
    }
    return bandera;
};

const ChangeStatusCaja = (obj) => {
    let idCaja = obj.id;
    let estatus = $(`#${idCaja}`).prop("checked") ? 1 : 0;
    Swal.fire({
        icon: "question",
        text: "¿Estás seguro de cambiar el estatus?",
        showCancelButton: true,
        confirmButtonColor: "#00a676",
        cancelButtonColor: "#E73F69",
        confirmButtonText: "Si, Continuar",
        cancelButtonText: "Cancelar",
        width: 400,
    }).then((result) => {
        if (result.isConfirmed) {
            validChangeStatusCaja(idCaja, estatus);
        } else {
            $(`#${idCaja}`).prop("checked", !estatus);
        }
    });
};

const validChangeStatusCaja = (id, estatus) => {
    axios
        .put("/cajas/estatus/editar", { id: id, estatus: estatus })
        .then(function ({ data }) {
            let { stats } = data;
            if (stats.status == "success") {
                toastr.success("El estatus se ha cambiado.");
            } else {
                $(`#${id}`).prop("checked", !estatus);
                toastr.error(stats.message);
            }
        })
        .catch(function (e) {
            $(`#${id}`).prop("checked", !estatus);
            toastr.error("Error del servidor.");
        });
};

const DeleteCaja = (obj) => {
    Swal.fire({
        title: "¿Estás seguro de realizar esta acción?",
        html: "Solo se eliminara la caja si no contiene movimientos.",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#00a676",
        cancelButtonColor: "#E73F69",
        confirmButtonText: "Si, Continuar",
        cancelButtonText: "Cancelar",
        width: 400,
    }).then((result) => {
        if (result.isConfirmed) {
            ActionDeleteCaja(obj.id);
        }
    });
};

const ActionDeleteCaja = (id) => {
    axios
        .delete("/cajas/eliminar", { params: { id: id } })
        .then(function ({ data }) {
            let { stats } = data;
            if (stats.status == "success") {
                alertDefault("¡Exito!", stats.message, "success", "/cajas");
            } else {
                alertDefault("¡Error!", stats.message, "error");
            }
        })
        .catch(function (error) {
            alertDefault("¡Error!", "error del servidor", "error");
        });
};

$(function () {
    $("#FormCreateCaja").on("submit", function (event) {
        event.preventDefault();
        FormCreateCaja();
    });

    $("#FormEditCaja").on("submit", function (event) {
        event.preventDefault();
        FormEditCaja();
    });
});
