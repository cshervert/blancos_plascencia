toastr.options = {
    closeButton: true,
    progressBar: true,
    positionClass: "toast-bottom-right",
};

const alertLoading = (flag) => {
    let timerInterval = flag === false ? 100 : 50000;
    Swal.fire({
        title: "Espere un momento ...",
        timer: timerInterval,
        width: 250,
        position: "center",
        html: `<div class="spinner-border text-primary mt-2 mb-2" role="status">
                    <span class="sr-only"></span>
                </div>`,
        showConfirmButton: false,
        allowOutsideClick: false,
    });
};

const submitLogin = async (event) => {
    event.preventDefault();
    let validate = await validateFormLogin();
    if (!validate) {
        $("#label-msg").html("Credenciales Obligatorias!");
        toastr.error("Credenciales Obligatorias");
        return;
    }
    alertLoading(true);
    axios
        .post("/login", {
            username: $("#username").val(),
            password: $("#password").val(),
            activo: 1
        })
        .then(function ({ data }) {
            alertLoading(false);
            let { result, message } = data;
            if (result === "success") {
                window.location.href = "/dashboard";
            } else {
                $("#label-msg").html("Credenciales incorrectas!");
                toastr.error("Credenciales incorrectas");
            }
        })
        .catch(function (error) {
            alertLoading(false);
            toastr.error("Credenciales Obligatorias");
        });
};

const validateFormLogin = () => {
    let validate = true;
    let usuario = $("#username").val();
    let password = $("#password").val();
    if (usuario == "" || usuario.length < 5) {
        validate = false;
        $("#username").addClass("form-control-danger");
    } else {
        $("#username").removeClass("form-control-danger");
    }
    if (password == "" || password.length < 5) {
        validate = false;
        $("#password").addClass("form-control-danger");
    } else {
        $("#password").removeClass("form-control-danger");
    }
    return validate;
};

const clearFormLogin = () => {
    if (validateFormLogin()) {
        $("#label-msg").html("");
    }
};

$(function () {
    $("#FormLogin").on("submit", submitLogin);
});
