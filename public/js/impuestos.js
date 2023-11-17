const FormCreateImpuesto = async () => {
    let validate = await validateFormImpuesto();
    if (!validate) {
        toastr.error("Campos Obligatorios.");
        return;
    }
    alertLoading(true);
    axios
        .post("/impuestos/crear", $("#FormCreateImpuesto").serialize())
        .then(function ({ data }) {
            alertLoading(false);
            let { stats } = data;
            if (stats.status == "success") {
                alertDefault("¡Exito!", stats.message, "success", "/impuestos");
            } else {
                alertDefault("¡Error!", stats.message, "error");
            }
        })
        .catch(function (error) {
            alertLoading(false);
            alertDefault("¡Error!", "error del servidor", "error");
        });
};

const validateFormImpuesto = () => {
    let bandera = true;
    let nombre = $("#nombre").val();
    let impuesto = $("#impuesto").val();
    let orden = $("#orden").val();

    if (nombre == "") {
        $("#advertencia-nombre").html("* Obligatorio");
        $("#nombre").addClass("form-control-danger");
        bandera = false;
    } else {
        $("#advertencia-nombre").html("");
        $("#nombre").removeClass("form-control-danger");
    }

    if (impuesto == "") {
        $("#advertencia-impuesto").html("* Obligatorio (numero)");
        $("#impuesto").addClass("form-control-danger");
        bandera = false;
    } else {
        $("#advertencia-impuesto").html("");
        $("#impuesto").removeClass("form-control-danger");
    }
    if (orden == "") {
        $("#advertencia-ciudad").html("* Obligatorio");
        $("#ciudad").addClass("form-control-danger");
        bandera = false;
    } else {
        $("#advertencia-ciudad").html("");
        $("#ciudad").removeClass("form-control-danger");
    }
    return bandera;
};

const FormEditImpuesto = async () => {
    let validate = await validateFormImpuesto();
    if (!validate) {
        toastr.error("Campo Obligatorio.");
        return;
    }
    alertLoading(true);
    axios
        .put("/impuestos/editar", $("#FormEditImpuesto").serialize())
        .then(function ({ data }) {
            alertLoading(false);
            let { stats } = data;
            if (stats.status == "success") {
                alertDefault("¡Exito!", stats.message, "success");
            } else {
                alertDefault("¡Error!", stats.message, "error");
            }
        })
        .catch(function (error) {
            alertLoading(false);
            alertDefault("¡Error!", "error del servidor", "error");
        });
};

const ChangeStatusImpuesto = (obj) => {
    let idImpuesto = obj.id;
    let estatus = $(`#${idImpuesto}`).prop("checked") ? 1 : 0;
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
            validChangeStatusImpuesto(idImpuesto, estatus);
        } else {
            $(`#${idImpuesto}`).prop("checked", !estatus);
        }
    });
};

const validChangeStatusImpuesto = (id, estatus) => {
    axios
        .put("/impuestos/estatus/editar", { id: id, estatus: estatus })
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
            toastr.error("Error del servidor.");
        });
};

const DeleteImpuesto = (obj) => {
    Swal.fire({
        title: "¿Estás seguro de realizar esta acción?",
        html: "Solo se eliminará el impuesto, si no se incluye en algún artículo.",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#00a676",
        cancelButtonColor: "#E73F69",
        confirmButtonText: "Si, Continuar",
        cancelButtonText: "Cancelar",
        width: 400,
    }).then((result) => {
        if (result.isConfirmed) {
            ActionDeleteImpuesto(obj.id);
        }
    });
};

const ActionDeleteImpuesto = (id) => {
    axios
        .delete("/impuestos/eliminar", { params: { id: id } })
        .then(function ({ data }) {
            let { stats } = data;
            if (stats.status == "success") {
                alertDefault("¡Exito!", stats.message, "success", "/impuestos");
            } else {
                alertDefault("¡Error!", stats.message, "error");
            }
        })
        .catch(function (error) {
            alertDefault("¡Error!", "error del servidor", "error");
        });
};

$(function () {
    $("#FormCreateImpuesto").on("submit", function (event) {
        event.preventDefault();
        FormCreateImpuesto();
    });

    $("#FormEditImpuesto").on("submit", function (event) {
        event.preventDefault();
        FormEditImpuesto();
    });
});
