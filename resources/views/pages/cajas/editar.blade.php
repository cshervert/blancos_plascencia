<div class="modal fade" id="editar-caja-modal" tabindex="-1" role="dialog" aria-labelledby="my-editar-caja-modal"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-blue" id="my-editar-caja-modal">Editar Caja</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    <i class="icon-copy fa fa-close" aria-hidden="true"></i>
                </button>
            </div>
            <form id="FormEditCaja">
                <div class="modal-body row">
                    <input type="hidden" name="idEditar" id="idEditar">
                    <div class="form-group col-md-12">
                        <label class="form-label" for="nombreEditar">Nombre</label>
                        <label class="form-control-label has-danger ml-2" id="advertencia-nombreEditar"></label>
                        <input class="form-control" type="text" name="nombreEditar" id="nombreEditar" onkeyup="validateFormCaja()">
                    </div>
                    <div class="form-group col-md-8">
                        <label class="form-label" for="sucursalEditar">Sucursal</label>
                        <select class="custom-select2 form-control" name="sucursalEditar" id="sucursalEditar" style="width:100%;">
                            @foreach ($sucursales as $item)
                            <option value="{{ $item->id }}">{{ $item->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-4 text-center">
                        <label for="enviarEditar">Email Automático</label><br>
                        <label class="cl-switch cl-switch-large cl-switch-green">
                            <input type="checkbox" id="enviarEditar" name="enviarEditar">
                            <span class="switcher"></span>
                        </label>
                    </div>
                    <div class="form-group col-md-12">
                        <label class="form-label" for="destinatariosEditar">Destinatarios</label>
                        <label class="form-control-label has-danger ml-2" id="advertencia-destinatariosEditar"></label>
                        <br>
                        <input type="text" id="destinatariosEditar" name="destinatariosEditar"
                            data-role="tagsinput" placeholder="agregar emails" onkeyup="validateFormCaja()">
                    </div>
                    <div class="form-group col-md-12">
                        <label class="form-label" for="activoEditar">Estatus </label>
                        <select class="custom-select2 form-control" name="activoEditar" id="activoEditar" style="width:100%;">
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