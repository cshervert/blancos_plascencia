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
            ActionDeleteCliente(obj);
        }
    });
};

function copiarRFC(elemento){
    $("#rfcfactura").val(elemento.value);
}
function copiarCURP(elemento){
    $("#curpfactura").val(elemento.value);
}

$("#btnCrearCliente").click(function(){
    var datos = $("#formCreateCliente").serialize();
    console.log(datos);

    alertLoading(true);
    axios
        .post("/clientes/crear", datos)
        .then(function (res) {
            alertLoading(false);
            if(res['data']['code'] == '200'){
                alertDefault("¡Exito!", res['msg'], "success", "/clientes");
            }
        })
        .catch(function (error) {
            alertLoading(false);
            alertDefault("¡Error!", "error del servidor", "error");
        });
});

$("#btnActualizarCliente").click(function(){
    var datos = $("#formEditCliente").serialize();
    console.log(datos);

    alertLoading(true);
    axios
        .put("/clientes/editar", datos)
        .then(function (res) {
            alertLoading(false);
            if(res['data']['code'] == '200'){
                alertDefault("¡Exito!", res['msg'], "success", "/clientes");
            }
        })
        .catch(function (error) {
            alertLoading(false);
            alertDefault("¡Error!", "error del servidor", "error");
        });
});

const ActionDeleteCliente = (id) => {
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