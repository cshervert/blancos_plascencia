<div class="modal fade" id="crear-departamento-modal" tabindex="-1" role="dialog" aria-labelledby="my-crear-departamento-modal" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-blue" id="my-crear-departamento-modal">Crear Departamento</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    <i class="icon-copy fa fa-close" aria-hidden="true"></i>
                </button>
            </div>
            <form id="FormCreateDepartamento">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="form-label" for="nombre-departamento">Nombre</label>
                        <label class="form-control-label has-danger ml-2" id="advertencia-nombre-departamento"></label>
                        <input class="form-control" type="text" name="nombre-departamento" id="nombre-departamento" onkeyup="validateFormDepartamento()">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">SALIR</button>
                    <button type="submit" class="btn btn-success">
                        GUARDAR <i class="icon-copy dw dw-checked ml-1"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>