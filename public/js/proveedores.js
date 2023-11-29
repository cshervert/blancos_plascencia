const DeleteProveedor = (obj) => {
    Swal.fire({
        title: "¿Estás seguro de realizar esta acción?",
        html: "Se eliminará el proveedor permanentemente.",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#00a676",
        cancelButtonColor: "#E73F69",
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
    createProveedor();
});

const createProveedor = async () => {

    let validate = await validateFormProveedor();
    if (!validate) {
        toastr.error("Campos Obligatorios.");
        return;
    }

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
};

const validateFormProveedor= () => {
    let bandera = true;
    let representante = $("#representante").val();
    let nombre = $("#nombre").val();
    let rfc = $("#rfc").val();
    let telefono = $("#telefono").val();
    let celular = $("#celular").val();
    let email = $("#email").val();
    let razon = $("#razon").val();
    let rfcfactura = $("#rfcfactura").val();
    let domicilio = $("#domicilio").val();
    let exterior = $("#exterior").val();
    let colonia = $("#colonia").val();
    let cp = $("#cp").val();

    if (representante == "" || representante == undefined) {
        $("#msg-representante").html("* Obligatorio");
        $("#representante").addClass("form-control-danger");
        bandera = false;
    } else {
        $("#msg-representante").html("");
        $("#representante").removeClass("form-control-danger");
    }
    if (nombre == "" || nombre == undefined) {
        $("#msg-nombre").html("* Obligatorio");
        $("#nombre").addClass("form-control-danger");
        bandera = false;
    } else {
        $("#msg-nombre").html("");
        $("#nombre").removeClass("form-control-danger");
    }
    if (rfc == "" || rfc == undefined || rfc.length < 12) {
        $("#msg-rfc").html("* Obligatorio (12 dígitos minimo)");
        $("#rfc").addClass("form-control-danger");
        bandera = false;
    } else {
        $("#msg-rfc").html("");
        $("#rfc").removeClass("form-control-danger");
    }
    if (!ValidatarEmail(email)) {
        $("#msg-email").html("* Email no valido");
        $("#email").addClass("form-control-danger");
        bandera = false;
    } else {
        $("#msg-email").html("");
        $("#email").removeClass("form-control-danger");
    }
    if (telefono == "" || telefono == undefined || telefono.length < 8) {
        $("#msg-telefono").html("* Obligatorio (min 8 dígitos)");
        $("#telefono").addClass("form-control-danger");
        bandera = false;
    } else {
        $("#msg-telefono").html("");
        $("#telefono").removeClass("form-control-danger");
    }
    if (celular == "" || celular == undefined || celular.length < 10) {
        $("#msg-celular").html("* Obligatorio (min 10 dígitos)");
        $("#celular").addClass("form-control-danger");
        bandera = false;
    } else {
        $("#msg-celular").html("");
        $("#celular").removeClass("form-control-danger");
    }
    if (domicilio == "" || domicilio == undefined || domicilio.length < 5) {
        $("#msg-domicilio").html("* Obligatorio (min 5 dígitos)");
        $("#domicilio").addClass("form-control-danger");
        bandera = false;
    } else {
        $("#msg-domicilio").html("");
        $("#domicilio").removeClass("form-control-danger");
    }    
    if (razon == "" || razon == undefined || razon.length < 5) {
        $("#msg-razon").html("* Obligatorio (5 dígitos minimo)");
        $("#razon").addClass("form-control-danger");
        bandera = false;
    } else {
        $("#msg-razon").html("");
        $("#razon").removeClass("form-control-danger");
    }
    if (rfcfactura == "" || rfcfactura == undefined || rfcfactura.length < 12) {
        $("#msg-rfcfactura").html("* Obligatorio (12 dígitos minimo)");
        $("#rfcfactura").addClass("form-control-danger");
        bandera = false;
    } else {
        $("#msg-rfcfactura").html("");
        $("#rfcfactura").removeClass("form-control-danger");
    }
    if (exterior == "" || exterior == undefined) {
        $("#msg-exterior").html("* Obligatorio");
        $("#exterior").addClass("form-control-danger");
        bandera = false;
    } else {
        $("#msg-exterior").html("");
        $("#exterior").removeClass("form-control-danger");
    }
    if (colonia == "" || colonia == undefined) {
        $("#msg-colonia").html("* Obligatorio");
        $("#colonia").addClass("form-control-danger");
        bandera = false;
    } else {
        $("#msg-colonia").html("");
        $("#colonia").removeClass("form-control-danger");
    }
    if (cp == "" || cp == undefined) {
        $("#msg-cp").html("* Obligatorio");
        $("#cp").addClass("form-control-danger");
        bandera = false;
    } else {
        $("#msg-cp").html("");
        $("#cp").removeClass("form-control-danger");
    }
    return bandera;
};

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

const ActionDeleteProveedor = (obj) => {
    axios
        .delete("/proveedores/eliminar", { params: { id: obj.id } })
        .then(function ({ data }) {
            let { stats } = data;
            if (stats.status == "success") {
                alertDefault("¡Exito!", stats.message, "success", "/proveedores");
            } else {
                alertDefault("¡Error!", stats.message, "error");
            }
        })
        .catch(function (error) {
            alertErrorServer(e);
        });
};

const ChangeStatusProveedor = (obj) => {
    let id = obj.id;
    let estatus = $(`#${id}`).prop("checked") ? 1 : 0;
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
            validChangeStatusProveedor(id, estatus);
        } else {
            $(`#${id}`).prop("checked", !estatus);
        }
    });
};

const validChangeStatusProveedor = (id, estatus) => {
    axios
        .put("/proveedores/estatus/editar", { id: id, estatus: estatus })
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

const formImportarProveedores = async () => {

    var formData = new FormData(document.getElementById("formImportarProveedores"));
    var file = document.querySelector('#file');
    formData.append("file", file.files[0]);
    alertLoading(true);
    axios
        .post("/proveedores/importar", formData, {
            headers: {
                // 'Content-Type': 'multipart/form-data'
              }
        })
        .then(function ({ data }) {
            alertLoading(false);
            let { stats } = data;
            if (stats.status == "success") {
                alertDefault("¡Exito!", stats.message, "success", "/proveedores");
            } else {
                alertDefault("¡Error!", stats.message, "error");
            }
            $('#importar-modal').modal('hide');
        })
        .catch(function (e) {
            alertErrorServer(e);
        });
};

$(function () {

    $("#formImportarProveedores").on("submit", function (event) {
        event.preventDefault();
        formImportarProveedores();
    });
});
