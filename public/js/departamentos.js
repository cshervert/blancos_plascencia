const openModalCrearDepartamento = () => {
    $("#crear-departamento-modal").modal("show");
};

const FormCreateDepartamento = async () => {
    let validate = await validateFormDepartamento();
    if (!validate) {
        toastr.error("Campo Obligatorio.");
        return;
    }
    alertLoading(true);
    axios
        .post("/departamentos/crear", $("#FormCreateDepartamento").serialize())
        .then(function ({ data }) {
            alertLoading(false);
            let { stats } = data;
            if (stats.status == "success") {
                alertDefault(
                    "¡Exito!",
                    stats.message,
                    "success",
                    "/departamentos"
                );
            } else {
                alertDefault("¡Error!", stats.message, "error");
            }
        })
        .catch(function (e) {
            alertErrorServer(e);
        });
};

const validateFormDepartamento = () => {
    let bandera = true;
    let nombre = $("#nombre-departamento").val();
    if (nombre == "" || nombre.length < 4) {
        $("#advertencia-nombre-departamento").html(
            "* Obligatorio (minimo 4 digitos)"
        );
        $("#nombre-departamento").addClass("form-control-danger");
        bandera = false;
    } else {
        $("#advertencia-nombre-departamento").html("");
        $("#nombre-departamento").removeClass("form-control-danger");
    }
    return bandera;
};

const openModalEditarDepartamento = async (obj) => {
    let id = obj.id;
    let response = await axios("/departamentos/editar/" + id)
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
        $("#id-departamento").val(response.id);
        $("#nombre-departamento-editar").val(response.departamento);
        $("#activo-departamento")
            .select2()
            .val(response.activo)
            .trigger("change");
        $("#editar-departamento-modal").modal("show");
    } else {
        toastr.error("Ocurrio un error.");
    }
};

const FormUpdateDepartamento = async () => {
    let validate = await validateFormDepartamentoEditar();
    if (!validate) {
        toastr.error("Campo Obligatorio.");
        return;
    }
    alertLoading(true);
    axios
        .put("/departamentos/editar", $("#FormUpdateDepartamento").serialize())
        .then(function ({ data }) {
            alertLoading(false);
            let { stats } = data;
            if (stats.status == "success") {
                alertDefault(
                    "¡Exito!",
                    stats.message,
                    "success",
                    "/departamentos"
                );
            } else {
                alertDefault("¡Error!", stats.message, "error");
            }
        })
        .catch(function (e) {
            alertErrorServer(e);
        });
};

const validateFormDepartamentoEditar = () => {
    let bandera = true;
    let nombre = $("#nombre-departamento-editar").val();
    if (nombre == "" || nombre.length < 4) {
        $("#advertencia-nombre-departamento-editar").html(
            "* Obligatorio (minimo 4 digitos)"
        );
        $("#nombre-departamento-editar").addClass("form-control-danger");
        bandera = false;
    } else {
        $("#advertencia-nombre-departamento-editar").html("");
        $("#nombre-departamento-editar").removeClass("form-control-danger");
    }
    return bandera;
};

const ChangeStatusDepartamento = (obj) => {
    let idDepartamento = obj.id;
    let estatus = $(`#${idDepartamento}`).prop("checked") ? 1 : 0;
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
            validChangeStatusDepartamento(idDepartamento, estatus);
        } else {
            $(`#${idDepartamento}`).prop("checked", !estatus);
        }
    });
};

const validChangeStatusDepartamento = (id, estatus) => {
    axios
        .put("/departamentos/estatus/editar", { id: id, estatus: estatus })
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

const DeleteDepartamento = (obj) => {
    Swal.fire({
        title: "¿Estás seguro de realizar esta acción?",
        html: "Se eliminará el departamento permanentemente.",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#00a676",
        cancelButtonColor: "#E73F69",
        confirmButtonText: "Si, Continuar",
        cancelButtonText: "Cancelar",
        width: 400,
    }).then((result) => {
        if (result.isConfirmed) {
            ActionDeleteDepartamento(obj.id);
        }
    });
};

const ActionDeleteDepartamento = (id) => {
    axios
        .delete("/departamentos/eliminar", { params: { id: id } })
        .then(function ({ data }) {
            let { stats } = data;
            if (stats.status == "success") {
                alertDefault("¡Exito!", stats.message, "success", "/departamentos");
            } else {
                alertDefault("¡Error!", stats.message, "error");
            }
        })
        .catch(function (e) {
            alertErrorServer(e);
        });
};

$(function () {
    $("#FormCreateDepartamento").on("submit", function (event) {
        event.preventDefault();
        FormCreateDepartamento();
    });

    $("#FormUpdateDepartamento").on("submit", function (event) {
        event.preventDefault();
        FormUpdateDepartamento();
    });
});
