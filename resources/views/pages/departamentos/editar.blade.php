<div class="modal fade" id="editar-departamento-modal" tabindex="-1" role="dialog" aria-labelledby="my-editar-departamento-modal" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-blue" id="my-editar-departamento-modal">Editar Departamento</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    <i class="icon-copy fa fa-close" aria-hidden="true"></i>
                </button>
            </div>
            <form id="FormUpdateDepartamento">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="form-label" for="nombre-departamento-editar">Nombre</label>
                        <label class="form-control-label has-danger ml-2" id="advertencia-nombre-departamento-editar"></label>
                        <input class="form-control" type="text" name="nombre-departamento-editar" id="nombre-departamento-editar" onkeyup="validateFormDepartamentoEditar()">
                        <input type="hidden" name="id-departamento" id="id-departamento">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="activo-departamento">Estatus </label>
                        <select class="custom-select2 form-control" name="activo-departamento" id="activo-departamento" style="width:100%;">
                            <option value="1">Activo</option>
                            <option value="0">Inactivo</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">SALIR</button>
                    <button type="submit" class="btn btn-info">
                        ACTUALIZAR <i class="icon-copy dw dw-edit-2 ml-1"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>