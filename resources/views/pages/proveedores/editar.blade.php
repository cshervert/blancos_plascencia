@extends('layouts.app')
@section('title', 'Editar Proveedor')
@section('content')
<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <div class="title">
                        <h4>Editar Proveedor</h4>
                    </div>
                    <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Inicio</a></li>
                            <li class="breadcrumb-item" aria-current="page"><a href="{{ route('proveedores') }}">Proveedores</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Editar</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-md-6 col-sm-12 text-right">
                    <a class="btn btn-secondary" href="{{ route('proveedores') }}">
                        REGRESAR <i class="icon-copy dw dw-return-1"></i>
                    </a>
                </div>
            </div>
            <div class="pd-30 card-box">
                <form id="formEditProveedor" class="row">
                    @csrf
                    <input class="form-control" type="hidden" name="id" id="id" placeholder="" value="{{$proveedor->id}}">
                    <div class="form-group col-sm-12 col-md-12">
                        <label class="weight-600 " for="rol" style="font-size: 16px">
                            Representante
                        </label>
                        <label class="form-control-label has-danger ml-2" id="msg-representante"></label>
                        <input class="form-control" type="text" name="representante" onkeyup="validateFormProveedor()" id="representante" value="{{ $proveedor->representante ? $proveedor->representante : ''}}">
                    </div>
                    <div class="form-group col-sm-12 col-md-12">
                        <label class="weight-600" for="rol" style="font-size: 16px">
                            Nombre
                        </label>
                        <label class="form-control-label has-danger ml-2" id="msg-nombre"></label>
                        <input class="form-control" type="text" name="nombre" id="nombre" onkeyup="validateFormProveedor()" value="{{ $proveedor->nombre ? $proveedor->nombre : ''}}">
                    </div>
                    <div class="form-group col-sm-12 col-md-12">
                        <label class="weight-600" for="rol" style="font-size: 16px">
                            Alias
                        </label>
                        <label class="form-control-label has-danger ml-2" id="msg-alias"></label>
                        <input class="form-control" type="text" value="{{ $proveedor->alias ? $proveedor->alias : ''}}" name="alias" id="alias">
                    </div>
                    <div class="form-group col-sm-12 col-md-6">
                        <label class="weight-600" for="rol" style="font-size: 16px">
                            RFC
                        </label>
                        <label class="form-control-label has-danger ml-2" id="msg-rfc"></label>
                        <input class="form-control" maxlength="13" onkeyup="validateFormProveedor()" onkeyup="copiarRFC(this)" type="text" name="rfc" id="rfc" value="{{ $proveedor->rfc ? $proveedor->rfc : ''}}">
                    </div>
                    <div class="form-group col-sm-12 col-md-6">
                        <label class="weight-600" for="rol" style="font-size: 16px">
                            CURP
                        </label>
                        <label class="form-control-label has-danger ml-2" id="msg-curp"></label>
                        <input class="form-control" maxlength="18" onkeyup="copiarCURP(this)" type="text" name="curp" id="curp" value="{{ $proveedor->curp ? $proveedor->curp : ''}}">
                    </div>
                    <div class="form-group col-sm-12 col-md-6">
                        <label class="weight-600" for="rol" style="font-size: 16px">
                            Telefono
                        </label>
                        <label class="form-control-label has-danger ml-2" id="msg-telefono"></label>
                        <input class="form-control" type="text" onkeyup="validateFormProveedor()" name="telefono" id="telefono" value="{{ $proveedor->telefono ? $proveedor->telefono : ''}}">
                    </div>
                    <div class="form-group col-sm-12 col-md-6">
                        <label class="weight-600" for="rol" style="font-size: 16px">
                            Celular
                        </label>
                        <label class="form-control-label has-danger ml-2" id="msg-celular"></label>
                        <input class="form-control" type="text" onkeyup="validateFormProveedor()" name="celular" id="celular" value="{{ $proveedor->celular ? $proveedor->celular : ''}}">
                    </div>
                    <div class="form-group col-sm-12 col-md-12">
                        <label class="weight-600" for="rol" style="font-size: 16px">
                            Email
                        </label>
                        <label class="form-control-label has-danger ml-2" id="msg-email"></label>
                        <input class="form-control" type="text" onkeyup="validateFormProveedor()" name="email" id="email" value="{{ $proveedor->email ? $proveedor->email : ''}}">
                    </div>
                    <div class="form-group col-sm-12 col-md-12">
                        <label class="weight-600" for="rol" style="font-size: 16px">
                            Comentario
                        </label>
                        <label class="form-control-label has-danger ml-2" id="msg-comentario"></label>
                        <input class="form-control" type="text" name="comentario" id="comentario" value="{{ $proveedor->comentario ? $proveedor->comentario : ''}}">
                    </div>
                    <div class="form-group col-sm-12 col-md-4">
                        <label class="weight-600" for="rol" style="font-size: 16px">
                            Limite de Credito
                        </label>
                        <label class="form-control-label has-danger ml-2" id="msg-limite"></label>
                        <input class="form-control" type="text" name="limite" id="limite" value="{{ $proveedor->limite_credito ? $proveedor->limite_credito : ''}}">
                    </div>
                    <div class="form-group col-sm-12 col-md-4">
                        <label class="weight-600" for="rol" style="font-size: 16px">
                            Dias de Credito
                        </label>
                        <label class="form-control-label has-danger ml-2" id="msg-dias"></label>
                        <input class="form-control" type="text" name="dias" id="dias" value="{{ $proveedor->dias_credito ? $proveedor->dias_credito : ''}}">
                    </div>
                    <div class="form-group col-sm-12 col-md-12">
                        <hr class="mt-1 mb-2">
                        <label class="weight-800" for="rol" style="font-size: 20px">
                            Datos de facturación
                        </label>                    
                    </div>
                    <div class="form-group col-sm-12 col-md-12">
                        <label class="weight-600" for="rol" style="font-size: 16px">
                            Razon Social
                        </label>
                        <label class="form-control-label has-danger ml-2" id="msg-razon"></label>
                        <input class="form-control" type="hidden" name="id_factura" id="id_factura" placeholder="" value="{{$factura->id}}">
                        <input class="form-control" type="text" onkeyup="validateFormProveedor()" name="razon" id="razon" value="{{ $factura->razon_social ? $factura->razon_social : ''}}">
                    </div>
                    <div class="form-group col-sm-12 col-md-6">
                        <label class="weight-600" for="rol" style="font-size: 16px">
                            RFC
                        </label>
                        <label class="form-control-label has-danger ml-2" id="msg-rfcfactura"></label>
                        <input class="form-control" type="text" onkeyup="validateFormProveedor()" name="rfcfactura" maxlength="13" id="rfcfactura" value="{{ $factura->rfc ? $factura->rfc : ''}}">
                    </div>
                    <div class="form-group col-sm-12 col-md-6">
                        <label class="weight-600" for="rol" style="font-size: 16px">
                            CURP
                        </label>
                        <label class="form-control-label has-danger ml-2" id="msg-curpfactura"></label>
                        <input class="form-control" type="text" maxlength="18" name="curpfactura" id="curpfactura" value="{{ $factura->curp ? $factura->curp : ''}}">
                    </div>
                    <div class="form-group col-sm-12 col-md-6">
                        <label class="weight-600" for="rol" style="font-size: 16px">
                            Domicilio
                        </label>
                        <label class="form-control-label has-danger ml-2" id="msg-domicilio"></label>
                        <input class="form-control" type="text" onkeyup="validateFormProveedor()" name="domicilio" id="domicilio" value="{{ $factura->domicilio ? $factura->domicilio : ''}}">
                    </div>
                    <div class="form-group col-sm-12 col-md-3">
                        <label class="weight-600" for="rol" style="font-size: 16px">
                            No. Exterior
                        </label>
                        <label class="form-control-label has-danger ml-2" id="msg-exterior"></label>
                        <input class="form-control" type="text" onkeyup="validateFormProveedor()" name="exterior" id="exterior" value="{{ $factura->numero_exterior ? $factura->numero_exterior : ''}}">
                    </div>
                    <div class="form-group col-sm-12 col-md-3">
                        <label class="weight-600" for="rol" style="font-size: 16px">
                            No. Interior
                        </label>
                        <label class="form-control-label has-danger ml-2" id="msg-interior"></label>
                        <input class="form-control" type="text" name="interior" id="interior" value="{{ $factura->numero_interior ? $factura->numero_interior : ''}}">
                    </div>
                    <div class="form-group col-sm-12 col-md-6">
                        <label class="weight-600" for="rol" style="font-size: 16px">
                            Colonia
                        </label>
                        <label class="form-control-label has-danger ml-2" id="msg-colonia"></label>
                        <input class="form-control" type="text" name="colonia" onkeyup="validateFormProveedor()" id="colonia" value="{{ $factura->colonia ? $factura->colonia : ''}}">
                    </div>
                    <div class="form-group col-sm-12 col-md-2">
                        <label class="weight-600" for="rol" style="font-size: 16px">
                            C.P.
                        </label>
                        <label class="form-control-label has-danger ml-2" id="msg-cp"></label>
                        <input class="form-control" type="text" onkeyup="validateFormProveedor()" name="cp" id="cp" value="{{ $factura->cp ? $factura->cp : ''}}">
                    </div>
                    <div class="form-group col-sm-12 col-md-4">
                        <label class="weight-600" for="rol" style="font-size: 16px">
                            Ciudad
                        </label>
                        <label class="form-control-label has-danger ml-2" id="msg-ciudad"></label>
                        <input class="form-control" type="text" name="ciudad" id="ciudad" value="{{ $factura->ciudad ? $factura->ciudad : ''}}">
                    </div>
                    <div class="form-group col-sm-12 col-md-4">
                        <label class="weight-600" for="rol" style="font-size: 16px">
                            Localidad
                        </label>
                        <label class="form-control-label has-danger ml-2" id="msg-localidad"></label>
                        <input class="form-control" type="text" name="localidad" id="localidad" value="{{ $factura->localidad ? $factura->localidad : ''}}">
                    </div>
                    <div class="form-group col-sm-12 col-md-4">
                        <label class="weight-600" for="rol" style="font-size: 16px">
                            Estado
                        </label>
                        <label class="form-control-label has-danger ml-2" id="msg-estado"></label>
                        <input class="form-control" type="text" name="estado" id="estado" value="{{ $factura->estado ? $factura->estado : ''}}">
                    </div>
                    <div class="form-group col-sm-12 col-md-4">
                        <label class="weight-600" for="rol" style="font-size: 16px">
                            Pais
                        </label>
                        <label class="form-control-label has-danger ml-2" id="msg-pais"></label>
                        <input class="form-control" type="text" name="pais" id="pais" value="{{ $factura->pais ? $factura->pais : ''}}">
                    </div>
                    <div class="col-12 text-right">
                        <button type="button" id="btnActualizarProveedor" class="btn btn-success">
                            ACTUALIZAR PROVEEDOR <i class="icon-copy dw dw-checked"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script src="{{ asset('js/proveedores.js') }}"></script>
@endsection