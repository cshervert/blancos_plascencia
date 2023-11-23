<div class="modal fade" id="crear-categoria-modal" tabindex="-1" role="dialog" aria-labelledby="my-crear-categoria-modal" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-blue" id="my-crear-categoria-modal">Crear Categoría</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    <i class="icon-copy fa fa-close" aria-hidden="true"></i>
                </button>
            </div>
            <form id="FormCreateCategoria">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="form-label" for="nombre-categoria">Nombre</label>
                        <label class="form-control-label has-danger ml-2" id="advertencia-nombre-categoria"></label>
                        <input class="form-control" type="text" name="nombre-categoria" id="nombre-categoria" onkeyup="validateFormCreateCategoria()">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="id-departamento-categoria">Departamento</label>
                        <select class="custom-select2 form-control" name="id-departamento-categoria" id="id-departamento-categoria" style="width:100%;">
                        @foreach ($departamentos as $item)
                            <option value="{{ $item->id }}">{{ $item->departamento }}</option>
                        @endforeach
                        </select>
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