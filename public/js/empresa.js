$("#btnEmpresa").click(function(){
    var datos = $("#formEmpresa").serialize();
    alertLoading(true);
    axios
        .post("/empresa/save", datos)
        .then(function (res) {
            alertLoading(false);
            console.log(res);
            console.log(res['data']['code']);
            if(res['code'] == 200){
                toastr.success('Actualizado correctamente!', '...')
                // window.location.href = "/empresa";
            }
            // let { result, message } = data;
            // if (result === "success") {
            //     window.location.href = "/dashboard";
            // } else {
            //     $("#label-msg").html("Credenciales incorrectas!");
            //     toastr.error("Credenciales incorrectas");
            // }
        })
        .catch(function (error) {
            alertLoading(false);
            toastr.error("Credenciales Obligatorias");
        });
    console.log(datos);
  });


$(function () {
});
