<div class="modal fade" id="crear-caja-modal" tabindex="-1" role="dialog" aria-labelledby="my-crear-caja-modal"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-blue" id="my-crear-caja-modal">Crear Caja</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    <i class="icon-copy fa fa-close" aria-hidden="true"></i>
                </button>
            </div>
            <form id="FormCreateCaja">
                <div class="modal-body row">
                    <div class="form-group col-md-12">
                        <label class="form-label" for="nombre">Nombre</label>
                        <label class="form-control-label has-danger ml-2" id="advertencia-nombre"></label>
                        <input class="form-control" type="text" name="nombre" id="nombre" onkeyup="validateFormCaja()">
                    </div>
                    <div class="form-group col-md-8">
                        <label class="form-label" for="sucursal">Sucursal</label>
                        <select class="custom-select2 form-control" name="sucursal" style="width:100%;">
                            @foreach ($sucursales as $item)
                            <option value="{{ $item->id }}">{{ $item->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-4 text-center">
                        <label for="enviar">Email Automático</label><br>
                        <label class="cl-switch cl-switch-large cl-switch-green">
                            <input type="checkbox" id="enviar" name="enviar" checked>
                            <span class="switcher"></span>
                        </label>
                    </div>
                    <div class="form-group col-md-12">
                        <label class="form-label" for="destinatarios">Destinatarios</label>
                        <label class="form-control-label has-danger ml-2" id="advertencia-destinatarios"></label>
                        <br>
                        <input type="text" id="destinatarios" name="destinatarios" value="{{ $usuario['email'] }}"
                            data-role="tagsinput" placeholder="agregar emails" onkeyup="validateFormCaja()">
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