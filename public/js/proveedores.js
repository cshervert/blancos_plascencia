const DeleteProveedor = (obj) => {
    Swal.fire({
        title: "¿Estás seguro de realizar esta acción?",
        html: "Se eliminará el proveedor permanentemente.",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#521a49",
        cancelButtonColor: "#dc3545",
        confirmButtonText: "Si, Continuar",
        cancelButtonText: "Cancelar",
        width: 400,
    }).then((result) => {
        if (result.isConfirmed) {
            ActionDeleteProveedor(obj);
        }
    });
};

function copiarRFC(elemento){
    $("#rfcfactura").val(elemento.value);
}
function copiarCURP(elemento){
    $("#curpfactura").val(elemento.value);
}


$("#btnCrearProveedor").click(function(){
    var datos = $("#formCreateProveedor").serialize();
    console.log(datos);

    alertLoading(true);
    axios
        .post("/proveedores/crear", datos)
        .then(function (res) {
            alertLoading(false);
            if(res['data']['code'] == '200'){
                alertDefault("¡Exito!", res['msg'], "success", "/proveedores");
            }
        })
        .catch(function (error) {
            alertLoading(false);
            alertDefault("¡Error!", "error del servidor", "error");
        });
});

$("#btnActualizarProveedor").click(function(){
    var datos = $("#formEditProveedor").serialize();
    console.log(datos);

    alertLoading(true);
    axios
        .put("/proveedores/editar", datos)
        .then(function (res) {
            alertLoading(false);
            if(res['data']['code'] == '200'){
                alertDefault("¡Exito!", res['msg'], "success", "/proveedores");
            }
        })
        .catch(function (error) {
            alertLoading(false);
            alertDefault("¡Error!", "error del servidor", "error");
        });
});

const ActionDeleteProveedor = (id) => {
    axios
        .delete("/proveedores/eliminar", { params: { id: id } })
        .then(function (res) {
            if(res['data']['code'] == '200'){
                alertDefault("¡Exito!", res['msg'], "success", "/proveedores");
            } else {
                alertDefault("¡Error!", res['msg'], "error");
            }
        })
        .catch(function (error) {
            alertDefault("¡Error!", "error del servidor", "error");
        });
};