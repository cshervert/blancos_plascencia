toastr.options = {
    closeButton: true,
    progressBar: true,
    positionClass: "toast-top-center",
};

const alertLoading = (flag) => {
    let timerInterval = flag === false ? 100 : 50000;
    console.log("entro");
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
    console.log(mensaje);
    let color = elegirColor(icono);
    Swal.fire({
        title: titulo,
        text: mensaje,
        icon: icono,
        confirmButtonColor: color,
        confirmButtonText: "Aceptar",
        width: 400,
    }).then((result) => {
        if (referencia) {
            location.href = referencia;
        }
    });
};

const elegirColor = (icono) => {
    let color;
    switch (icono) {
        case "success":
            color = "#00a676";
            break;
        case "error":
            color = "#E73F69";
            break;
        case "info":
            color = "#09ADB2";
            break;
        case "warning":
            color = "#ffc107";
            break;
        case "question":
            color = "#00a676";
            break;
        default:
            color = "#00a676";
            break;
    }
    return color;
};

$(".data-table").DataTable({
    scrollCollapse: true,
    autoWidth: false,
    responsive: true,
    columnDefs: [
        {
            targets: "datatable-nosort",
            orderable: false,
        },
    ],
    lengthMenu: [
        [10, 25, 50, -1],
        [10, 25, 50, "Todas"],
    ],
    language: {
        sInfo: "_START_ de _END_ | filas totales _TOTAL_",
        sLengthMenu: "Cantidad _MENU_",
        sInfoEmpty: "",
        sEmptyTable: "No hay datos disponibles en la tabla",
        sSearch: "Buscar",
        paginate: {
            next: '<i class="ion-chevron-right"></i>',
            previous: '<i class="ion-chevron-left"></i>',
        },
    },
});

const ValidatarEmail = (mail) => {
    if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(mail)) {
        return true;
    }
    return false;
};
