$("#btnEmpresa").click(function (){
    createEmpresa();
});

const createEmpresa = async () => {
    let validate = await validateFormEmpresa();
    if (!validate) {
        toastr.error("Campos Obligatorios.");
        return;
    }

    var datos = $("#formEmpresa").serialize();
    alertLoading(true);
    axios
        .post("/empresa/guardar", datos)
        .then(function (res) {
            alertLoading(false);
            if(res['data']['code'] == '200'){
                alertDefault("¡Exito!", res['msg'], "success", "/empresa");
            }
        })
        .catch(function (error) {
            alertLoading(false);
            alertDefault("¡Error!", "error del servidor", "error");
        });
};

const validateFormEmpresa= () => {
    let bandera = true;
    let nombre = $("#nombre").val();
    let rfc = $("#rfc").val();
    let domicilio = $("#domicilio").val();
    console.log(domicilio);
    let telefono = $("#telefono").val();
    let celular = $("#celular").val();
    let email = $("#email").val();

    if (nombre == "" || nombre == undefined) {
        $("#msg-nombre").html("* Obligatorio");
        $("#nombre").addClass("form-control-danger");
        bandera = false;
    } else {
        $("#msg-nombre").html("");
        $("#nombre").removeClass("form-control-danger");
    }
    if (domicilio == "" || domicilio == undefined || domicilio.length < 5) {
        $("#msg-domicilio").html("* Obligatorio (min 5 dígitos)");
        $("#domicilio").addClass("form-control-danger");
        bandera = false;
    } else {
        $("#msg-domicilio").html("");
        $("#domicilio").removeClass("form-control-danger");
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
    return bandera;
};

const validateFormCuenta= () => {
    let bandera = true;
    let cuenta = $("#cuenta").val();
    let clave = $("#clave").val();
    let banco = $("#banco").val();

    if (cuenta == "" || cuenta == undefined) {
        $("#msg-cuenta").html("* Obligatorio");
        $("#cuenta").addClass("form-control-danger");
        bandera = false;
    } else {
        $("#msg-cuenta").html("");
        $("#cuenta").removeClass("form-control-danger");
    }
    if (clave == "" || clave == undefined || clave.length < 12) {
        $("#msg-clave").html("* Obligatorio");
        $("#clave").addClass("form-control-danger");
        bandera = false;
    } else {
        $("#msg-clave").html("");
        $("#clave").removeClass("form-control-danger");
    }
    if (banco == "" || banco == undefined) {
        $("#msg-banco").html("* Obligatorio");
        $("#banco").addClass("form-control-danger");
        bandera = false;
    } else {
        $("#msg-banco").html("");
        $("#banco").removeClass("form-control-danger");
    }

    return bandera;
};

$("#btnCuenta").click(function(){
    createCuenta();
});

const createCuenta = async() =>{
    let validate = await validateFormCuenta();
    if (!validate) {
        toastr.error("Campos Obligatorios.");
        return;
    }

    var datos = $("#formCuenta").serialize();
    var a = $("#mostrar").val();
    console.log(datos);
    console.log(a);
    alertLoading(true);
    axios
        .post("/empresa/guardarCuenta", datos)
        .then(function (res) {
            alertLoading(false);
            if(res['data']['code'] == '200'){
                alertDefault("¡Exito!", res['msg'], "success", "/empresa");
            }
        })
        .catch(function (error) {
            alertLoading(false);
            alertDefault("¡Error!", "error del servidor", "error");
        });
}

const openModal = (obj) => {
    let data = JSON.parse(obj.id);
    
    $("#id").val(data.id);
    $("#cuenta").val(data.cuenta);
    $("#sucursal").val(data.sucursal);
    $("#clave").val(data.clave);
    $("#banco").val(data.banco);
    $("#contable").val(data.cuenta_contable);
    if(data.mostrar == 1){
        $("#mostrar").prop('checked', true);
    }else{
        $("#mostrar").prop('checked', false);
    }
    $('#cuenta-modal').modal('show');
};

const deleteCuenta = (obj) => {
    Swal.fire({
        title: "¿Estás seguro de realizar esta acción?",
        html: "Se eliminará la cuenta bancaria",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#521a49",
        cancelButtonColor: "#dc3545",
        confirmButtonText: "Si, Continuar",
        cancelButtonText: "Cancelar",
        width: 400,
    }).then((result) => {
        if (result.isConfirmed) {
            ActionDeleteCuenta(obj.id);
        }
    });
};

const ActionDeleteCuenta = (id) => {
    axios
        .delete("/empresa/eliminarCuenta", { params: { id: id } })
        .then(function (res) {
            if(res['data']['code'] == '200'){
                alertDefault("¡Exito!", res['msg'], "success", "/empresa");
            } else {
                alertDefault("¡Error!", res['msg'], "error");
            }
        })
        .catch(function (error) {
            alertDefault("¡Error!", "error del servidor", "error");
        });
};

const changeCuenta= (obj) => {
    let id = obj.id;
    let estatus = $(`#${id}`).prop("checked") ? 1 : 0;
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
            validChangeCuenta(id, estatus);
        } else {
            $(`#${id}`).prop("checked", !estatus);
        }
    });
};

const validChangeCuenta = (id, estatus) => {
    axios
        .put("/empresa/editCuenta", { id: id, estatus: estatus })
        .then(function (res) {

            if(res['data']['code'] == '200'){
                // alertDefault("¡Exito!", res['msg'], "success", "/empresa");
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

$(function () {
});
