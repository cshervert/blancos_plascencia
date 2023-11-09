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