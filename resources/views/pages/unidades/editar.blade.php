<div class="modal fade" id="editar-unidad-modal" tabindex="-1" role="dialog" aria-labelledby="my-editar-unidad-modal" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="my-editar-unidad-modal">Editar Unidad</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    <i class="icon-copy fa fa-close" aria-hidden="true"></i>
                </button>
            </div>
            <form id="FormEditUnidad">
                <div class="modal-body">
                    <input type="hidden" name="idEditar" id="idEditar">
                    <div class="form-group">
                        <label class="form-label" for="nombreEditar">Nombre</label>
                        <label class="form-control-label has-danger ml-2" id="advertencia-nombreEditar"></label>
                        <input class="form-control" type="text" name="nombreEditar" id="nombreEditar" onkeyup="validateFormEditUnidad()">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="claveEditar">Clave SAT</label>
                        <input class="form-control" type="text" name="claveEditar" id="claveEditar">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="activoEditar">Estatus </label>
                        <select class="custom-select2 form-control" name="activoEditar" id="activoEditar" style="width:100%;">
                            <option value="1">Activo</option>
                            <option value="0">Inactivo</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-info">
                        EDITAR <i class="icon-copy dw dw-edit-1"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>