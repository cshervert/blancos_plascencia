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

const searchCategoria = (obj) => {
    axios("/articulos/categoria/" + obj.value)
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
                toastr.error("Ocurrio un error.");
            }
        })
        .catch(function (e) {
            alertErrorServer(e);
        });
};
