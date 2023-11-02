$(function () {
    $("#FormLogin").on("submit", submitLogin);
});

const submitLogin = (event) => {
    event.preventDefault();
    axios
        .post("/login", {
            username: $("#username").val(),
            password: $("#password").val(),
        })
        .then(function ({ data }) {
            let { result, message } = data;
            if (result === "success") {
                window.location.href = "/dashboard";
            } else {
                Swal.fire({
                    icon: "error",
                    text: "Credenciales incorrectas",
                });
            }
        })
        .catch(function (error) {
            Swal.fire({
                icon: "error",
                text: "Credenciales requeridas",
            });
        });
};
