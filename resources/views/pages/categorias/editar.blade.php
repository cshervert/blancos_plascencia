<div class="modal fade" id="editar-categoria-modal" tabindex="-1" role="dialog" aria-labelledby="my-editar-categoria-modal" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-blue" id="my-editar-categoria-modal">Editar Categoría</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    <i class="icon-copy fa fa-close" aria-hidden="true"></i>
                </button>
            </div>
            <form id="FormEditCategoria">
                <input type="hidden" name="id-categoria" id="id-categoria">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="form-label" for="nombre-categoria-editar">Nombre</label>
                        <label class="form-control-label has-danger ml-2" id="advertencia-nombre-categoria-editar"></label>
                        <input class="form-control" type="text" name="nombre-categoria-editar" id="nombre-categoria-editar" onkeyup="validateFormEditCategoria()">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="id-departamento-categoria">Departamento</label>
                        <select class="custom-select2 form-control" name="id-departamento-categoria-editar" id="id-departamento-categoria-editar" style="width:100%;">
                        @foreach ($departamentos as $item)
                            <option value="{{ $item->id }}">{{ $item->departamento }}</option>
                        @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="activo-categoria">Estatus </label>
                        <select class="custom-select2 form-control" name="activo-categoria" id="activo-categoria" style="width:100%;">
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