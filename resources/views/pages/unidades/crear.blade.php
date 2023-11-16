<div class="modal fade" id="crear-unidad-modal" tabindex="-1" role="dialog" aria-labelledby="my-crear-unidad-modal" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="my-crear-unidad-modal">Crear Unidad</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    <i class="icon-copy fa fa-close" aria-hidden="true"></i>
                </button>
            </div>
            <form id="FormCreateUnidad">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="form-label" for="nombre">Nombre</label>
                        <label class="form-control-label has-danger ml-2" id="advertencia-nombre"></label>
                        <input class="form-control" type="text" name="nombre" id="nombre" onkeyup="validateFormUnidad()">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="clave">Clave SAT</label>
                        <input class="form-control" type="text" name="clave" id="clave">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-success">
                        CREAR <i class="icon-copy dw dw-checked ml-1"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>