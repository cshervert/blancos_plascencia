$("#btnEmpresa").click(function(){
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
    // console.log(datos);
});

$("#btnCuenta").click(function(){
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
});

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
