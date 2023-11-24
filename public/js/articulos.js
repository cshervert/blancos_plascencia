$("#factor").TouchSpin({
    min: 1,
    max: 10000,
    step: 1,
    boostat: 100,
    maxboostedstep: 100,
});

const GenerarClave = () => {
    axios("/articulos/generar/clave")
        .then(function ({ data }) {
            let { stats, responseData } = data;
            if (stats.status == "success") {
                $("#clave").val(responseData.clave);
                $("#clave_alterna").val(responseData.clave);
                toastr.success(stats.message);
            } else {
                toastr.error("Ocurrio un error.");
            }
        })
        .catch(function (e) {
            alertErrorServer(e);
        });
};

const searchCategoria = () => {
    let id = $("#departamento").val();
    axios("/articulos/categoria/" + id)
        .then(function ({ data }) {
            let { stats, responseData } = data;
            if (stats.status == "success") {
                let { categorias } = responseData;
                let filas = "";
                categorias.forEach((item) => {
                    filas += `<option value='${item.id}'>${item.categoria}</option>`;
                });
                $("#categoria").html(filas);
                toastr.success(stats.message);
            } else {
                $("#categoria").html("");
                toastr.error(stats.message);
            }
        })
        .catch(function (e) {
            alertErrorServer(e);
        });
};

const openModalCrearDepartamento = () => {
    $("#crear-departamento-modal").modal("show");
};

const openModalCrearCategoria = () => {
    $("#crear-categoria-modal").modal("show");
};

const openModalCrearUnidad = () => {
    $("#crear-unidad-modal").modal("show");
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
            let { stats, responseData } = data;
            let { departametos } = responseData;
            let filas = "";
            departametos.forEach((item) => {
                filas += `<option value='${item.id}'>${item.departamento}</option>`;
            });
            $("#departamento").html(filas);
            $("#id-departamento-categoria").html(filas);
            $("#crear-departamento-modal").modal("hide");
            toastr.success(stats.message);
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

const FormCreateCategoria = async () => {
    let validate = await validateFormCreateCategoria();
    if (!validate) {
        toastr.error("Campo Obligatorio.");
        return;
    }
    alertLoading(true);
    axios
        .post("/categorias/crear", $("#FormCreateCategoria").serialize())
        .then(function ({ data }) {
            alertLoading(false);
            let { stats } = data;
            if (stats.status == "success") {
                $("#crear-categoria-modal").modal("hide");
                toastr.success(stats.message);
                searchCategoria();
            } else {
                alertDefault("¡Error!", stats.message, "error");
            }
        })
        .catch(function (e) {
            alertErrorServer(e);
        });
};

const validateFormCreateCategoria = () => {
    let bandera = true;
    let nombre = $("#nombre-categoria").val();
    if (nombre == "" || nombre.length < 4) {
        $("#advertencia-nombre-categoria").html(
            "* Obligatorio (minimo 4 digitos)"
        );
        $("#nombre-categoria").addClass("form-control-danger");
        bandera = false;
    } else {
        $("#advertencia-nombre-categoria").html("");
        $("#nombre-categoria").removeClass("form-control-danger");
    }
    return bandera;
};

const FormCreateUnidad = async () => {
    let validate = await validateFormUnidad();
    if (!validate) {
        toastr.error("Campo Obligatorio.");
        return;
    }
    alertLoading(true);
    axios
        .post("/unidades/crear", $("#FormCreateUnidad").serialize())
        .then(function ({ data }) {
            alertLoading(false);
            let { stats, responseData } = data;
            if (stats.status == "success") {
                let { unidades } = responseData;
                let filas = "";
                unidades.forEach((item) => {
                    filas += `<option value='${item.id}'>${item.unidad}</option>`;
                });
                $("#unidad_compra").html(filas);
                $("#unidad_venta").html(filas);
                $("#crear-unidad-modal").modal("hide");
                toastr.success(stats.message);
            } else {
                toastr.error(stats.message);
            }
        })
        .catch(function (e) {
            alertErrorServer(e);
        });
};

const validateFormUnidad = () => {
    let bandera = true;
    let nombre = $("#nombre").val();
    if (nombre == "" || nombre.length < 1) {
        $("#advertencia-nombre").html("* Obligatorio (minimo 1 digito)");
        $("#nombre").addClass("form-control-danger");
        bandera = false;
    } else {
        $("#advertencia-nombre").html("");
        $("#nombre").removeClass("form-control-danger");
    }
    return bandera;
};

$(function () {
    $("#FormCreateDepartamento").on("submit", function (event) {
        event.preventDefault();
        FormCreateDepartamento();
    });

    $("#FormCreateCategoria").on("submit", function (event) {
        event.preventDefault();
        FormCreateCategoria();
    });

    $("#FormCreateUnidad").on("submit", function (event) {
        event.preventDefault();
        FormCreateUnidad();
    });
});
