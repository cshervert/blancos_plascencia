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

const alertDefault = (titulo, mensaje, icono, referencia = null) => {
    Swal.fire({
        title: titulo,
        text: mensaje,
        icon: icono,
        confirmButtonText: "Aceptar",
        width: 400,
    }).then((result) => {
        if (referencia) {
            location.href = referencia;
        }
    });
};
