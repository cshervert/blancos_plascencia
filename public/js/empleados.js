$("input[name='comision']").TouchSpin({
    min: 0,
    max: 100,
    step: 0.5,
    decimals: 2,
    boostat: 100,
    maxboostedstep: 100,
    postfix: "%",
});

const FormCreateEmpleado = async () => {
    let validate = await validateFormEmpleado();
    if (!validate) {
        toastr.error("Campos Obligatorios.");
        return;
    }
    alertLoading(true);
    axios
        .post("/empleados/crear", $("#FormCreateEmpleado").serialize())
        .then(function ({ data }) {
            alertLoading(false);
            let { stats } = data;
            if (stats.status == "success") {
                alertDefault("¡Exito!", stats.message, "success", "/empleados");
            } else {
                alertDefault("¡Error!", stats.message, "error");
            }
        })
        .catch(function (e) {
            alertErrorServer(e);
        });
};

const FormEditEmpledo = async () => {
    let validate = await validateFormEmpleado();
    if (!validate) {
        toastr.error("Campo Obligatorio.");
        return;
    }
    alertLoading(true);
    axios
        .put("/empleados/editar", $("#FormEditEmpledo").serialize())
        .then(function ({ data }) {
            alertLoading(false);
            let { stats } = data;
            if (stats.status == "success") {
                alertDefault("¡Exito!", stats.message, "success");
            } else {
                alertDefault("¡Error!", stats.message, "error");
            }
        })
        .catch(function (e) {
            alertErrorServer(e);
        });
};

const validateFormEmpleado = () => {
    let bandera = true;
    let alias = $("#alias").val();
    let nombre = $("#nombre").val();
    let direccion = $("#direccion").val();
    let ciudad = $("#ciudad").val();
    let celular = $("#celular").val();
    let email = $("#email").val();
    let comision = $("#comision").val();
    if (alias == "" || alias.length < 3) {
        $("#advertencia-alias").html("* Obligatorio (min 3 dígitos)");
        $("#alias").addClass("form-control-danger");
        bandera = false;
    } else {
        $("#advertencia-alias").html("");
        $("#alias").removeClass("form-control-danger");
    }
    if (nombre == "" || nombre.length < 5) {
        $("#advertencia-nombre").html("* Obligatorio (min 5 dígitos)");
        $("#nombre").addClass("form-control-danger");
        bandera = false;
    } else {
        $("#advertencia-nombre").html("");
        $("#nombre").removeClass("form-control-danger");
    }
    if (direccion == "" || direccion.length < 5) {
        $("#advertencia-direccion").html("* Obligatorio (min 5 dígitos)");
        $("#direccion").addClass("form-control-danger");
        bandera = false;
    } else {
        $("#advertencia-direccion").html("");
        $("#direccion").removeClass("form-control-danger");
    }
    if (ciudad == "" || ciudad.length < 5) {
        $("#advertencia-ciudad").html("* Obligatorio  (min 3)");
        $("#ciudad").addClass("form-control-danger");
        bandera = false;
    } else {
        $("#advertencia-ciudad").html("");
        $("#ciudad").removeClass("form-control-danger");
    }
    if (celular == "" || celular.length < 10) {
        $("#advertencia-celular").html("* Obligatorio (min 10)");
        $("#celular").addClass("form-control-danger");
        bandera = false;
    } else {
        $("#advertencia-celular").html("");
        $("#celular").removeClass("form-control-danger");
    }
    if (!ValidatarEmail(email)) {
        $("#advertencia-email").html("* (no valido)");
        $("#email").addClass("form-control-danger");
        bandera = false;
    } else {
        $("#advertencia-email").html("");
        $("#email").removeClass("form-control-danger");
    }
    if (comision == "") {
        $("#advertencia-comision").html("* Obligatorio (min 8 dígitos)");
        $("#comision").addClass("form-control-danger");
        bandera = false;
    } else {
        $("#advertencia-comision").html("");
        $("#comision").removeClass("form-control-danger");
    }
    return bandera;
};

const ChangeStatusEmpleado = (obj) => {
    let idEmpleado = obj.id;
    let estatus = $(`#${idEmpleado}`).prop("checked") ? 1 : 0;
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
            validChangeStatusEmpleado(idEmpleado, estatus);
        } else {
            $(`#${idEmpleado}`).prop("checked", !estatus);
        }
    });
};

const validChangeStatusEmpleado = (id, estatus) => {
    axios
        .put("/empleados/estatus/editar", { id: id, estatus: estatus })
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

const DeleteEmpleado = (obj) => {
    Swal.fire({
        title: "¿Estás seguro de realizar esta acción?",
        html: "Se eliminará al empleado permanentemente.",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#00a676",
        cancelButtonColor: "#E73F69",
        confirmButtonText: "Si, Continuar",
        cancelButtonText: "Cancelar",
        width: 400,
    }).then((result) => {
        if (result.isConfirmed) {
            ActionDeleteEmpleado(obj.id);
        }
    });
};

const ActionDeleteEmpleado = (id) => {
    axios
        .delete("/empleados/eliminar", { params: { id: id } })
        .then(function ({ data }) {
            let { stats } = data;
            if (stats.status == "success") {
                alertDefault("¡Exito!", stats.message, "success", "/empleados");
            } else {
                alertDefault("¡Error!", stats.message, "error");
            }
        })
        .catch(function (e) {
            alertErrorServer(e);
        });
};

const openModalCrearPuesto = () => {
    $("#crear-puesto-modal").modal("show");
};

$(function () {
    $("#FormCreateEmpleado").on("submit", function (event) {
        event.preventDefault();
        FormCreateEmpleado();
    });

    $("#FormEditEmpledo").on("submit", function (event) {
        event.preventDefault();
        FormEditEmpledo();
    });
});
