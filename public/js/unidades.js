const openModalCrearUnidad = () => {
    $("#crear-unidad-modal").modal("show");
};

const FormCreateUnidad = async () => {
    let validate = await validateFormUnidad();
    if (!validate) {
        toastr.error("Campo Obligatorio.");
        return;
    }
    alertLoading(true);
    axios
        .post("/unidades/crear", $("#FormCreateUnidad").serialize())
        .then(function ({ data }) {
            alertLoading(false);
            let { stats } = data;
            if (stats.status == "success") {
                alertDefault("¡Exito!", stats.message, "success", "/unidades");
            } else {
                alertDefault("¡Error!", stats.message, "error");
            }
        })
        .catch(function (error) {
            alertLoading(false);
            alertDefault("¡Error!", "error del servidor", "error");
        });
};

const validateFormUnidad = () => {
    let bandera = true;
    let nombre = $("#nombre").val();
    if (nombre == "" || nombre.length < 1) {
        $("#advertencia-nombre").html("* Obligatorio");
        $("#nombre").addClass("form-control-danger");
        bandera = false;
    } else {
        $("#advertencia-nombre").html("");
        $("#nombre").removeClass("form-control-danger");
    }
    return bandera;
};

const openModalEditarUnidad = async (obj) => {
    let idUnidad = obj.id;
    let response = await axios("/unidades/editar/" + idUnidad)
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
        $("#nombreEditar").val(response.unidad);
        $("#claveEditar").val(response.clave_sat);
        $("#activoEditar").select2().val(response.activo).trigger("change");
        $("#editar-unidad-modal").modal("show");
    } else {
        toastr.error("Ocurrio un error.");
    }
};

const FormEditUnidad = async () => {
    let validate = await validateFormEditUnidad();
    if (!validate) {
        toastr.error("Campo Obligatorio.");
        return;
    }
    alertLoading(true);
    axios
        .put("/unidades/editar", $("#FormEditUnidad").serialize())
        .then(function ({ data }) {
            alertLoading(false);
            let { stats } = data;
            if (stats.status == "success") {
                alertDefault("¡Exito!", stats.message, "success", "/unidades");
            } else {
                alertDefault("¡Error!", stats.message, "error");
            }
        })
        .catch(function (error) {
            alertLoading(false);
            alertDefault("¡Error!", "error del servidor", "error");
        });
};

const validateFormEditUnidad = () => {
    let bandera = true;
    let nombre = $("#nombreEditar").val();
    if (nombre == "" || nombre.length < 1) {
        $("#advertencia-nombreEditar").html("* Obligatorio");
        $("#nombreEditar").addClass("form-control-danger");
        bandera = false;
    } else {
        $("#advertencia-nombreEditar").html("");
        $("#nombreEditar").removeClass("form-control-danger");
    }
    return bandera;
};

const ChangeStatusUnidad = (obj) => {
    let idUnidad = obj.id;
    let estatus = $(`#${idUnidad}`).prop("checked") ? 1 : 0;
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
            validChangeStatusUnidad(idUnidad, estatus);
        } else {
            $(`#${idUnidad}`).prop("checked", !estatus);
        }
    });
};

const validChangeStatusUnidad = (id, estatus) => {
    axios
        .put("/unidades/estatus/editar", { id: id, estatus: estatus })
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

const DeleteUnidad = (obj) => {
    Swal.fire({
        title: "¿Estás seguro de realizar esta acción?",
        html: "Se eliminará la unidad permanentemente.",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#521a49",
        cancelButtonColor: "#dc3545",
        confirmButtonText: "Si, Continuar",
        cancelButtonText: "Cancelar",
        width: 400,
    }).then((result) => {
        if (result.isConfirmed) {
            ActionDeleteUnidad(obj.id);
        }
    });
};

const ActionDeleteUnidad = (id) => {
    axios
        .delete("/unidades/eliminar", { params: { id: id } })
        .then(function ({ data }) {
            let { stats } = data;
            if (stats.status == "success") {
                alertDefault("¡Exito!", stats.message, "success", "/unidades");
            } else {
                alertDefault("¡Error!", stats.message, "error");
            }
        })
        .catch(function (error) {
            alertDefault("¡Error!", "error del servidor", "error");
        });
};

$(function () {
    $("#FormCreateUnidad").on("submit", function (event) {
        event.preventDefault();
        FormCreateUnidad();
    });

    $("#FormEditUnidad").on("submit", function (event) {
        event.preventDefault();
        FormEditUnidad();
    });
});
