const openModalCrearCategoria = () => {
    $("#crear-categoria-modal").modal("show");
};

const FormCreateCategoria = async () => {
    let validate = await validateFormCreateCategoria();
    if (!validate) {
        toastr.error("Campo Obligatorio.");
        return;
    }
    alertLoading(true);
    axios
        .post("/categorias/crear", $("#FormCreateCategoria").serialize())
        .then(function ({ data }) {
            alertLoading(false);
            let { stats } = data;
            if (stats.status == "success") {
                alertDefault(
                    "¡Exito!",
                    stats.message,
                    "success",
                    "/categorias"
                );
            } else {
                alertDefault("¡Error!", stats.message, "error");
            }
        })
        .catch(function (e) {
            alertErrorServer(e);
        });
};

const validateFormCreateCategoria = () => {
    let bandera = true;
    let nombre = $("#nombre-categoria").val();
    if (nombre == "" || nombre.length < 4) {
        $("#advertencia-nombre-categoria").html(
            "* Obligatorio (minimo 4 digitos)"
        );
        $("#nombre-categoria").addClass("form-control-danger");
        bandera = false;
    } else {
        $("#advertencia-nombre-categoria").html("");
        $("#nombre-categoria").removeClass("form-control-danger");
    }
    return bandera;
};

const openModalEditarCategoria = async (obj) => {
    let id = obj.id;
    let response = await axios("/categorias/editar/" + id)
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
        $("#id-categoria").val(response.id);
        $("#nombre-categoria-editar").val(response.categoria);
        $("#id-departamento-categoria-editar").select2().val(response.id_departamento).trigger("change");
        $("#activo-categoria").select2().val(response.activo).trigger("change");
        $("#editar-categoria-modal").modal("show");
    } else {
        toastr.error("Ocurrio un error.");
    }
};

const FormEditCategoria = async () => {
    let validate = await validateFormEditCategoria();
    if (!validate) {
        toastr.error("Campo Obligatorio.");
        return;
    }
    alertLoading(true);
    axios
        .put("/categorias/editar", $("#FormEditCategoria").serialize())
        .then(function ({ data }) {
            alertLoading(false);
            let { stats } = data;
            if (stats.status == "success") {
                alertDefault(
                    "¡Exito!",
                    stats.message,
                    "success",
                    "/categorias"
                );
            } else {
                alertDefault("¡Error!", stats.message, "error");
            }
        })
        .catch(function (e) {
            alertErrorServer(e);
        });
};

const validateFormEditCategoria = () => {
    let bandera = true;
    let nombre = $("#nombre-categoria-editar").val();
    if (nombre == "" || nombre.length < 4) {
        $("#advertencia-nombre-categoria-editar").html(
            "* Obligatorio (minimo 4 digitos)"
        );
        $("#nombre-categoria-editar").addClass("form-control-danger");
        bandera = false;
    } else {
        $("#advertencia-nombre-categoria-editar").html("");
        $("#nombre-categoria-editar").removeClass("form-control-danger");
    }
    return bandera;
};

const ChangeStatusCategoria = (obj) => {
    let idCategoria = obj.id;
    let estatus = $(`#${idCategoria}`).prop("checked") ? 1 : 0;
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
            validChangeStatusCategoria(idCategoria, estatus);
        } else {
            $(`#${idCategoria}`).prop("checked", !estatus);
        }
    });
};

const validChangeStatusCategoria = (id, estatus) => {
    axios
        .put("/categorias/estatus/editar", { id: id, estatus: estatus })
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

const DeleteCategoria = (obj) => {
    Swal.fire({
        title: "¿Estás seguro de realizar esta acción?",
        html: "Se eliminará la categoría permanentemente.",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#00a676",
        cancelButtonColor: "#E73F69",
        confirmButtonText: "Si, Continuar",
        cancelButtonText: "Cancelar",
        width: 400,
    }).then((result) => {
        if (result.isConfirmed) {
            ActionDeleteCategoria(obj.id);
        }
    });
};

const ActionDeleteCategoria = (id) => {
    axios
        .delete("/categorias/eliminar", { params: { id: id } })
        .then(function ({ data }) {
            let { stats } = data;
            if (stats.status == "success") {
                alertDefault("¡Exito!", stats.message, "success", "/categorias");
            } else {
                alertDefault("¡Error!", stats.message, "error");
            }
        })
        .catch(function (e) {
            alertErrorServer(e);
        });
};

$(function () {
    $("#FormCreateCategoria").on("submit", function (event) {
        event.preventDefault();
        FormCreateCategoria();
    });

    $("#FormEditCategoria").on("submit", function (event) {
        event.preventDefault();
        FormEditCategoria();
    });
});
