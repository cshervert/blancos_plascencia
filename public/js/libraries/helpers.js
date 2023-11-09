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

$('.data-table').DataTable({
    scrollCollapse: true,
    autoWidth: false,
    responsive: true,
    columnDefs: [{
        targets: "datatable-nosort",
        orderable: false,
    }],
    "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
    "language": {
        "sInfo": "Mostrando del _START_ al _END_ de un total de _TOTAL_ filas",
        "sLengthMenu": "Mostrar   _MENU_  filas",
        "sInfoEmpty": "",
        "sEmptyTable": "No hay datos disponibles en la tabla",
        "sSearch": "Buscar:",
        paginate: {
            next: '<i class="ion-chevron-right"></i>',
            previous: '<i class="ion-chevron-left"></i>'  
        }
    },
});