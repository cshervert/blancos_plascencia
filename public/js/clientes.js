const DeleteCliente = (obj) => {
    Swal.fire({
        title: "¿Estás seguro de realizar esta acción?",
        html: "Se eliminará el cliente permanentemente.",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#521a49",
        cancelButtonColor: "#dc3545",
        confirmButtonText: "Si, Continuar",
        cancelButtonText: "Cancelar",
        width: 400,
    }).then((result) => {
        if (result.isConfirmed) {
            ActionDeleteRol(obj);
        }
    });
};

const ActionDeleteRol = (id) => {
    axios
        .delete("/clientes/eliminar", { params: { id: id } })
        .then(function (res) {
            if(res['data']['code'] == '200'){
                alertDefault("¡Exito!", res['msg'], "success", "/clientes");
            } else {
                alertDefault("¡Error!", res['msg'], "error");
            }
        })
        .catch(function (error) {
            alertDefault("¡Error!", "error del servidor", "error");
        });
};