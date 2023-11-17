const ChangeStatusRol = (obj) => {
    let idRol = obj.id;
    let estatus = $(`#${idRol}`).prop("checked") ? 1 : 0;
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
            validChangeStatusRol(idRol, estatus);
        } else {
            $(`#${idRol}`).prop("checked", !estatus);
        }
    });
};

const validChangeStatusRol = (id, estatus) => {
    axios
        .put("/roles/estatus/editar", { id: id, estatus: estatus })
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

const DeleteRol = (obj) => {
    Swal.fire({
        title: "¿Estás seguro de realizar esta acción?",
        html: "Se eliminará el rol con todos sus permisos.",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#00a676",
        cancelButtonColor: "#E73F69",
        confirmButtonText: "Si, Continuar",
        cancelButtonText: "Cancelar",
        width: 400,
    }).then((result) => {
        if (result.isConfirmed) {
            ActionDeleteRol(obj.id);
        }
    });
};

const ActionDeleteRol = (id) => {
    axios
        .delete("/roles/eliminar", { params: { id: id } })
        .then(function ({ data }) {
            let { stats } = data;
            if (stats.status == "success") {
                alertDefault("¡Exito!", stats.message, "success", "/roles");
            } else {
                alertDefault("¡Error!", stats.message, "error");
            }
        })
        .catch(function (error) {
            alertDefault("¡Error!", "error del servidor", "error");
        });
};

const validateFormRol = () => {
    let bandera = true;
    let rol = $("#rol").val();
    if (rol == "") {
        $("#msg-rol").html("* Obligatorio");
        $("#rol").addClass("form-control-danger");
        bandera = false;
    } else {
        $("#msg-rol").html("");
        $("#rol").removeClass("form-control-danger");
    }
    let read = 0;
    $("input[name='read[]']:checked").each(function () {
        read = 1;
    });
    let create = 0;
    $("input[name='create[]']:checked").each(function () {
        create = 1;
    });
    let update = 0;
    $("input[name='update[]']:checked").each(function () {
        update = 1;
    });
    let delete_ = 0;
    $("input[name='delete[]']:checked").each(function () {
        delete_ = 1;
    });
    if (create == 0 && read == 0 && update == 0 && delete_ == 0) {
        bandera = false;
    }
    return bandera;
};

const FormCreateRol = async () => {
    let validate = await validateFormRol();
    if (!validate) {
        toastr.error("Permisos Obligatorios.");
        return;
    }
    alertLoading(true);
    axios
        .post("/roles/crear", $("#FormCreateRol").serialize())
        .then(function ({ data }) {
            alertLoading(false);
            let { stats } = data;
            if (stats.status == "success") {
                alertDefault("¡Exito!", stats.message, "success", "/roles");
            } else {
                alertDefault("¡Error!", stats.message, "error");
            }
        })
        .catch(function (error) {
            alertLoading(false);
            alertDefault("¡Error!", "error del servidor", "error");
        });
};

const FormUpdateRol = async () => {
    let validate = await validateFormRol();
    if (!validate) {
        toastr.error("Permisos Obligatorios.");
        return;
    }
    alertLoading(true);
    axios
        .put("/roles/editar", $("#FormUpdateRol").serialize())
        .then(function ({ data }) {
            alertLoading(false);
            let { stats, responseData } = data;
            if (stats.status == "success") {
                alertDefault(
                    "¡Exito!",
                    stats.message,
                    "success",
                    "/roles/editar/" + responseData.id
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

const eventSelectedAllPermission = () => {
    let $checkBox_create = $('input[name="create[]"]');
    let $checkBox_read = $('input[name="read[]"]');
    let $checkBox_update = $('input[name="update[]"]');
    let $checkBox_delete = $('input[name="delete[]"]');
    $("#btn_check_all_create").on("change", function () {
        if ($(this)[0].checked) {
            for (let i = 0; i < $checkBox_create.length; i++) {
                $($checkBox_create[i])[0].checked = true;
            }
        } else {
            for (let i = 0; i < $checkBox_create.length; i++) {
                $($checkBox_create[i])[0].checked = false;
            }
        }
    });
    $("#btn_check_all_read").on("change", function () {
        if ($(this)[0].checked) {
            for (let i = 0; i < $checkBox_read.length; i++) {
                $($checkBox_read[i])[0].checked = true;
            }
        } else {
            for (let i = 0; i < $checkBox_read.length; i++) {
                $($checkBox_read[i])[0].checked = false;
            }
        }
    });
    $("#btn_check_all_update").on("change", function () {
        if ($(this)[0].checked) {
            for (let i = 0; i < $checkBox_update.length; i++) {
                $($checkBox_update[i])[0].checked = true;
            }
        } else {
            for (let i = 0; i < $checkBox_update.length; i++) {
                $($checkBox_update[i])[0].checked = false;
            }
        }
    });
    $("#btn_check_all_delete").on("change", function () {
        if ($(this)[0].checked) {
            for (let i = 0; i < $checkBox_delete.length; i++) {
                $($checkBox_delete[i])[0].checked = true;
            }
        } else {
            for (let i = 0; i < $checkBox_delete.length; i++) {
                $($checkBox_delete[i])[0].checked = false;
            }
        }
    });
};

$(function () {
    $("#FormCreateRol").on("submit", function (event) {
        event.preventDefault();
        FormCreateRol();
    });

    $("#FormUpdateRol").on("submit", function (event) {
        event.preventDefault();
        FormUpdateRol();
    });
    
    eventSelectedAllPermission();
});
