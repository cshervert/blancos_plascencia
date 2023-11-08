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
        toastr.error("Permisos Obligatorias");
        return;
    }
    axios
        .post("/roles/crear", $("#FormCreateRol").serialize())
        .then(function ({ data }) {
            console.log(data);
        })
        .catch(function (error) {
            console.log(error);
            // alertLoading(false);
            // toastr.error("Credenciales Obligatorias");
        });
};

$(function () {
    eventSelectedAllPermission();
    $("#FormCreateRol").on("submit", function (event) {
        event.preventDefault();
        FormCreateRol();
    });
});
