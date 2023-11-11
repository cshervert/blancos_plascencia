const ChangeStatusSucursal = (obj) => {
    let idSucursal = obj.id;
    let estatus = $(`#${idSucursal}`).prop("checked") ? 1 : 0;
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
            validChangeStatusSucursal(idSucursal, estatus);
        } else {
            $(`#${idSucursal}`).prop("checked", !estatus);
        }
    });
};

const validChangeStatusSucursal = (id, estatus) => {
    axios
        .put("/sucursales/estatus/editar", { id: id, estatus: estatus })
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

const DeleteSucursal = (obj) => {
    Swal.fire({
        title: "¿Estás seguro de realizar esta acción?",
        html: "Se eliminará la sucursal permanentemente.",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#521a49",
        cancelButtonColor: "#dc3545",
        confirmButtonText: "Si, Continuar",
        cancelButtonText: "Cancelar",
        width: 400,
    }).then((result) => {
        if (result.isConfirmed) {
            ActionDeleteSucursal(obj.id);
        }
    });
};

const ActionDeleteSucursal = (id) => {
    axios
        .delete("/sucursales/eliminar", { params: { id: id } })
        .then(function ({ data }) {
            let { stats } = data;
            if (stats.status == "success") {
                alertDefault(
                    "¡Exito!",
                    stats.message,
                    "success",
                    "/sucursales"
                );
            } else {
                alertDefault("¡Error!", stats.message, "error");
            }
        })
        .catch(function (error) {
            alertDefault("¡Error!", "error del servidor", "error");
        });
};

const FormCreateSucursal = async () => {
    let validate = await validateFormSucursal();
    if (!validate) {
        toastr.error("Campos Obligatorios.");
        return;
    }
    alertLoading(true);
    axios
        .post("/sucursales/crear", $("#FormCreateSucursal").serialize())
        .then(function ({ data }) {
            alertLoading(false);
            let { stats } = data;
            if (stats.status == "success") {
                alertDefault("¡Exito!", stats.message, "success", "/sucursales");
            } else {
                alertDefault("¡Error!", stats.message, "error");
            }
        })
        .catch(function (error) {
            alertLoading(false);
            alertDefault("¡Error!", "error del servidor", "error");
        });
};

const FormUpdateSucursal = async () => {
    let validate = await validateFormSucursal();
    if (!validate) {
        toastr.error("Permisos Obligatorios.");
        return;
    }
    alertLoading(true);
    axios
        .put("/sucursales/editar", $("#FormUpdateSucursal").serialize())
        .then(function ({ data }) {
            alertLoading(false);
            let { stats, responseData } = data;
            if (stats.status == "success") {
                alertDefault(
                    "¡Exito!",
                    stats.message,
                    "success",
                    "/sucursales/editar/" + responseData.id
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

const validateFormSucursal = () => {
    let bandera = true;
    let nombre = $("#nombre").val();
    let domicilio = $("#domicilio").val();
    let ciudad = $("#ciudad").val();
    let email = $("#email").val();
    let telefono = $("#telefono").val();
    let celular = $("#celular").val();
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

$(function () {
    $("#FormCreateSucursal").on("submit", function (event) {
        event.preventDefault();
        FormCreateSucursal();
    });

    $("#FormUpdateSucursal").on("submit", function (event) {
        event.preventDefault();
        FormUpdateSucursal();
    });
    
});
