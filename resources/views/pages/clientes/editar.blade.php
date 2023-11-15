@extends('layouts.app')
@section('title', 'Editar Cliente')
@section('content')
<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <div class="title">
                        <h4>Editar Cliente</h4>
                    </div>
                    <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Inicio</a></li>
                            <li class="breadcrumb-item" aria-current="page"><a href="{{ route('clientes') }}">Clientes</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Editar</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-md-6 col-sm-12 text-right">
                    <a class="btn btn-secondary" href="{{ route('clientes') }}">
                        REGRESAR <i class="icon-copy dw dw-return-1"></i>
                    </a>
                </div>
            </div>
            <div class="pd-30 card-box">
                <form id="formEditCliente" class="row">
                    @csrf
                    <div class="form-group col-sm-12 col-md-4">
                        <label class="weight-600 " for="rol" style="font-size: 16px">
                            No. Cliente
                        </label>
                        <label class="form-control-label has-danger ml-2" id="msg-nocliente"></label>
                        <input class="form-control" type="hidden" name="id" id="id" placeholder="" value="{{$cliente->id}}">
                        <input class="form-control" value="{{ $cliente->numero_cliente ? $cliente->numero_cliente : ''}}" type="text" name="nocliente" id="nocliente">
                    </div>
                    <div class="form-group col-sm-12 col-md-8">
                        <label class="weight-600" for="rol" style="font-size: 16px">
                            Clave
                        </label>
                        <label class="form-control-label has-danger ml-2" id="msg-clave"></label>
                        <input class="form-control" type="text" value="{{ $cliente->clave ? $cliente->clave : ''}}" name="clave" id="clave">
                    </div>
                    <div class="form-group col-sm-12 col-md-12">
                        <label class="weight-600 " for="rol" style="font-size: 16px">
                            Representante
                        </label>
                        <label class="form-control-label has-danger ml-2" id="msg-representante"></label>
                        <input class="form-control" type="text" name="representante" id="representante" value="{{ $cliente->representante ? $cliente->representante : ''}}">
                    </div>
                    <div class="form-group col-sm-12 col-md-12">
                        <label class="weight-600" for="rol" style="font-size: 16px">
                            Nombre
                        </label>
                        <label class="form-control-label has-danger ml-2" id="msg-nombre"></label>
                        <input class="form-control" type="text" name="nombre" id="nombre" value="{{ $cliente->nombre ? $cliente->nombre : ''}}">
                    </div>
                    <div class="form-group col-sm-12 col-md-6">
                        <label class="weight-600" for="rol" style="font-size: 16px">
                            RFC
                        </label>
                        <label class="form-control-label has-danger ml-2" id="msg-rfc"></label>
                        <input class="form-control" maxlength="13" onkeyup="copiarRFC(this)" type="text" name="rfc" id="rfc" value="{{ $cliente->rfc ? $cliente->rfc : ''}}">
                    </div>
                    <div class="form-group col-sm-12 col-md-6">
                        <label class="weight-600" for="rol" style="font-size: 16px">
                            CURP
                        </label>
                        <label class="form-control-label has-danger ml-2" id="msg-curp"></label>
                        <input class="form-control" maxlength="18" onkeyup="copiarCURP(this)" type="text" name="curp" id="curp" value="{{ $cliente->curp ? $cliente->curp : ''}}">
                    </div>
                    <div class="form-group col-sm-12 col-md-6">
                        <label class="weight-600" for="rol" style="font-size: 16px">
                            Telefono
                        </label>
                        <label class="form-control-label has-danger ml-2" id="msg-telefono"></label>
                        <input class="form-control" type="text" name="telefono" id="telefono" value="{{ $cliente->telefono ? $cliente->telefono : ''}}">
                    </div>
                    <div class="form-group col-sm-12 col-md-6">
                        <label class="weight-600" for="rol" style="font-size: 16px">
                            Celular
                        </label>
                        <label class="form-control-label has-danger ml-2" id="msg-celular"></label>
                        <input class="form-control" type="text" name="celular" id="celular" value="{{ $cliente->celular ? $cliente->celular : ''}}">
                    </div>
                    <div class="form-group col-sm-12 col-md-12">
                        <label class="weight-600" for="rol" style="font-size: 16px">
                            Email
                        </label>
                        <label class="form-control-label has-danger ml-2" id="msg-email"></label>
                        <input class="form-control" type="text" name="email" id="email" value="{{ $cliente->email ? $cliente->email : ''}}">
                    </div>
                    <div class="form-group col-sm-12 col-md-4">
                        <label class="weight-600" for="rol" style="font-size: 16px">
                            No. de Precio
                        </label>
                        <label class="form-control-label has-danger ml-2" id="msg-noprecio"></label>
                        <!-- <input class="form-control" type="text" name="noprecio" id="noprecio"> -->
                        <select class="selectpicker form-control" name="noprecio" id="noprecio" style="width: 100%; height: 38px;">
                                <option value="1" {{ $cliente->numero_precio == 1 ? 'selected' : ''}}>1</option>
                                <option value="2" {{ $cliente->numero_precio == 2 ? 'selected' : ''}}>2</option>
                                <option value="3" {{ $cliente->numero_precio == 3 ? 'selected' : ''}}>3</option>
                                <option value="4" {{ $cliente->numero_precio == 4 ? 'selected' : ''}}>4</option>
                        </select>
                    </div>
                    <div class="form-group col-sm-12 col-md-4">
                        <label class="weight-600" for="rol" style="font-size: 16px">
                            Limite de Credito
                        </label>
                        <label class="form-control-label has-danger ml-2" id="msg-limite"></label>
                        <input class="form-control" type="text" name="limite" id="limite" value="{{ $cliente->limite_credito ? $cliente->limite_credito : ''}}">
                    </div>
                    <div class="form-group col-sm-12 col-md-4">
                        <label class="weight-600" for="rol" style="font-size: 16px">
                            Dias de Credito
                        </label>
                        <label class="form-control-label has-danger ml-2" id="msg-dias"></label>
                        <input class="form-control" type="text" name="dias" id="dias" value="{{ $cliente->dias_credito ? $cliente->dias_credito : ''}}">
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
                        <input class="form-control" type="text" name="razon" id="razon" value="{{ $factura->razon_social ? $factura->razon_social : ''}}">
                    </div>
                    <div class="form-group col-sm-12 col-md-6">
                        <label class="weight-600" for="rol" style="font-size: 16px">
                            RFC
                        </label>
                        <label class="form-control-label has-danger ml-2" id="msg-rfcfactura"></label>
                        <input class="form-control" type="text" name="rfcfactura" maxlength="13" id="rfcfactura" value="{{ $factura->rfc ? $factura->rfc : ''}}">
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
                        <input class="form-control" type="text" name="domicilio" id="domicilio" value="{{ $factura->domicilio ? $factura->domicilio : ''}}">
                    </div>
                    <div class="form-group col-sm-12 col-md-3">
                        <label class="weight-600" for="rol" style="font-size: 16px">
                            No. Interior
                        </label>
                        <label class="form-control-label has-danger ml-2" id="msg-interior"></label>
                        <input class="form-control" type="text" name="interior" id="interior" value="{{ $factura->numero_interior ? $factura->numero_interior : ''}}">
                    </div>
                    <div class="form-group col-sm-12 col-md-3">
                        <label class="weight-600" for="rol" style="font-size: 16px">
                            No. Exterior
                        </label>
                        <label class="form-control-label has-danger ml-2" id="msg-exterior"></label>
                        <input class="form-control" type="text" name="exterior" id="exterior" value="{{ $factura->numero_exterior ? $factura->numero_exterior : ''}}">
                    </div>
                    <div class="form-group col-sm-12 col-md-6">
                        <label class="weight-600" for="rol" style="font-size: 16px">
                            Colonia
                        </label>
                        <label class="form-control-label has-danger ml-2" id="msg-colonia"></label>
                        <input class="form-control" type="text" name="colonia" id="colonia" value="{{ $factura->colonia ? $factura->colonia : ''}}">
                    </div>
                    <div class="form-group col-sm-12 col-md-2">
                        <label class="weight-600" for="rol" style="font-size: 16px">
                            C.P.
                        </label>
                        <label class="form-control-label has-danger ml-2" id="msg-cp"></label>
                        <input class="form-control" type="text" name="cp" id="cp" value="{{ $factura->cp ? $factura->cp : ''}}">
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
                        <button type="button" id="btnActualizarCliente" class="btn btn-success">
                            ACTUALIZAR CLIENTE <i class="icon-copy dw dw-checked"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script src="{{ asset('js/clientes.js') }}"></script>
@endsection