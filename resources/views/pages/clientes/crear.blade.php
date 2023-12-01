@extends('layouts.app')
@section('title', 'Crear Cliente')
@section('content')
<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <div class="title">
                        <h4 class="text-blue">Crear Cliente</h4>
                    </div>
                    <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Inicio</a></li>
                            <li class="breadcrumb-item" aria-current="page"><a href="{{ route('clientes') }}">Clientes</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Crear</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-md-6 col-sm-12 text-right">
                    <button class="btn btn-dark mb-3" data-toggle="modal" data-target="#grupo-modal" type="button">
                        CREAR GRUPO <i class="icon-copy dw dw-add"></i>
                    </button>
                    <a class="btn btn-secondary mb-3" href="{{ route('clientes') }}">
                        REGRESAR <i class="icon-copy dw dw-return-1"></i>
                    </a>
                </div>
            </div>
            <div class="pd-30 card-box">
                <h6 class="text-blue mb-2 text-uppercase">Datos Generales</h6>
                <hr>
                <form id="formCreateCliente" class="row">
                    @csrf
                    <div class="form-group col-sm-12 col-md-6 col-lg-4">
                        <label class="weight-600" for="rol">
                            Clave
                        </label>
                        <label class="form-control-label has-danger ml-2" id="msg-clave"></label>
                        <input class="form-control" type="text" name="clave" id="clave">
                    </div>
                    <div class="form-group col-sm-12 col-md-6 col-lg-4">
                        <label class="weight-600 " for="rol">
                            Representante
                        </label>
                        <label class="form-control-label has-danger ml-2" id="msg-representante"></label>
                        <input class="form-control" type="text" onkeyup="validateFormCliente()" name="representante" id="representante">
                    </div>
                    <div class="form-group col-sm-12 col-md-6 col-lg-4">
                        <label class="weight-600" for="rol">
                            Nombre
                        </label>
                        <label class="form-control-label has-danger ml-2" id="msg-nombre"></label>
                        <input class="form-control" type="text" onkeyup="validateFormCliente()" name="nombre" id="nombre">
                    </div>
                    <div class="form-group col-sm-12 col-md-6 col-lg-4">
                        <label class="weight-600" for="rol">
                            RFC
                        </label>
                        <label class="form-control-label has-danger ml-2" id="msg-rfc"></label>
                        <input class="form-control" maxlength="13" onkeyup="validateFormCliente()" onkeyup="copiarRFC(this)" type="text" name="rfc" id="rfc">
                    </div>
                    <div class="form-group col-sm-12 col-md-6 col-lg-4">
                        <label class="weight-600" for="rol">
                            CURP
                        </label>
                        <label class="form-control-label has-danger ml-2" id="msg-curp"></label>
                        <input class="form-control" maxlength="18" onkeyup="copiarCURP(this)" type="text" name="curp" id="curp">
                    </div>
                    <div class="form-group col-sm-12 col-md-6 col-lg-4">
                        <label class="weight-600" for="rol">
                            Telefono
                        </label>
                        <label class="form-control-label has-danger ml-2" id="msg-telefono"></label>
                        <input class="form-control" type="text" onkeyup="validateFormCliente()" name="telefono" id="telefono">
                    </div>
                    <div class="form-group col-sm-12 col-md-6 col-lg-4">
                        <label class="weight-600" for="rol">
                            Celular
                        </label>
                        <label class="form-control-label has-danger ml-2" id="msg-celular"></label>
                        <input class="form-control" type="text" onkeyup="validateFormCliente()" name="celular" id="celular">
                    </div>
                    <div class="form-group col-sm-12 col-md-6 col-lg-4">
                        <label class="weight-600" for="rol">
                            Email
                        </label>
                        <label class="form-control-label has-danger ml-2" id="msg-email"></label>
                        <input class="form-control" type="text" onkeyup="validateFormCliente()" name="email" id="email">
                    </div>
                    <div class="form-group col-sm-12 col-md-6 col-lg-4">
                        <label class="weight-600" for="rol">
                            No. de Precio
                        </label>
                        <label class="form-control-label has-danger ml-2" id="msg-noprecio"></label>
                        <!-- <input class="form-control" type="text" name="noprecio" id="noprecio"> -->
                        <select class="form-control custom-select2" onchange="validateFormCliente()" name="noprecio" id="noprecio" style="width: 100%">
                                <option value="0">Seleccionar precio</option>
                                <option value="1">Precio Público</option>
                                <option value="2">Precio Vendedor</option>
                                <option value="3">Precio Cliente</option>
                                <option value="4">Precio Promoción</option>
                        </select>
                    </div>
                    <div class="form-group col-sm-12 col-md-6 col-lg-4">
                        <label class="weight-600" for="rol">
                            Limite de Credito
                        </label>
                        <label class="form-control-label has-danger ml-2" id="msg-limite"></label>
                        <input class="form-control" type="text" name="limite" id="limite">
                    </div>
                    <div class="form-group col-sm-12 col-md-6 col-lg-4">
                        <label class="weight-600" for="rol">
                            Dias de Credito
                        </label>
                        <label class="form-control-label has-danger ml-2" id="msg-dias"></label>
                        <input class="form-control" type="text" name="dias" id="dias">
                    </div>
                    <div class="form-group col-sm-12 col-md-6 col-lg-4">
                        <label class="weight-600" for="rol">
                            Grupo
                        </label>
                        <label class="form-control-label has-danger ml-2" id="msg-grupo"></label>
                        <!-- <input class="form-control" type="hidden" value="0" name="grupoBand" id="grupoBand"> -->
                        <select class="form-control custom-select2" name="grupo" id="grupo" style="width: 100%">
                            <option value="0">Seleccionar grupo</option>
                            @foreach ($grupos as $item)
                                <option value="{{$item->id}}">{{$item->nombre}}</option>
                            @endforeach
                        </select>
                    </div>  
                    <div class="form-group col-sm-12 col-md-12 mb-0">
                        <h6 class="text-blue mb-0 text-uppercase">Datos de Facturación</h6>
                        <hr>                  
                    </div>
                    <div class="form-group col-sm-12 col-md-12 col-lg-4">
                        <label class="weight-600" for="rol">
                            Razon Social
                        </label>
                        <label class="form-control-label has-danger ml-2" id="msg-razon"></label>
                        <input class="form-control" type="text" onkeyup="validateFormCliente()" name="razon" id="razon">
                    </div>
                    <div class="form-group col-sm-12 col-md-6 col-lg-4">
                        <label class="weight-600" for="rol">
                            RFC
                        </label>
                        <label class="form-control-label has-danger ml-2" id="msg-rfcfactura"></label>
                        <input class="form-control" maxlength="13" onkeyup="validateFormCliente()" type="text" name="rfcfactura" id="rfcfactura">
                    </div>
                    <div class="form-group col-sm-12 col-md-6 col-lg-4">
                        <label class="weight-600" for="rol">
                            CURP
                        </label>
                        <label class="form-control-label has-danger ml-2" id="msg-curpfactura"></label>
                        <input class="form-control" maxlength="18" type="text" name="curpfactura" id="curpfactura">
                    </div>
                    <div class="form-group col-sm-12 col-md-6">
                        <label class="weight-600" for="rol">
                            Domicilio
                        </label>
                        <label class="form-control-label has-danger ml-2" id="msg-domicilio"></label>
                        <input class="form-control" type="text" onkeyup="validateFormCliente()" name="domicilio" id="domicilio">
                    </div>
                    <div class="form-group col-sm-12 col-md-3">
                        <label class="weight-600" for="rol">
                            No. Exterior
                        </label>
                        <label class="form-control-label has-danger ml-2" id="msg-exterior"></label>
                        <input class="form-control" type="text" onkeyup="validateFormCliente()" name="exterior" id="exterior">
                    </div>
                    <div class="form-group col-sm-12 col-md-3">
                        <label class="weight-600" for="rol">
                            No. Interior
                        </label>
                        <label class="form-control-label has-danger ml-2" id="msg-interior"></label>
                        <input class="form-control" type="text" name="interior" id="interior">
                    </div>
                    <div class="form-group col-sm-12 col-md-6">
                        <label class="weight-600" for="rol">
                            Colonia
                        </label>
                        <label class="form-control-label has-danger ml-2" id="msg-colonia"></label>
                        <input class="form-control" type="text" onkeyup="validateFormCliente()" name="colonia" id="colonia">
                    </div>
                    <div class="form-group col-sm-12 col-md-2">
                        <label class="weight-600" for="rol">
                            C.P.
                        </label>
                        <label class="form-control-label has-danger ml-2" id="msg-cp"></label>
                        <input class="form-control" type="text" onkeyup="validateFormCliente()" name="cp" id="cp">
                    </div>
                    <div class="form-group col-sm-12 col-md-4">
                        <label class="weight-600" for="rol">
                            Ciudad
                        </label>
                        <label class="form-control-label has-danger ml-2" id="msg-ciudad"></label>
                        <input class="form-control" type="text" name="ciudad" id="ciudad">
                    </div>
                    <div class="form-group col-sm-12 col-md-4">
                        <label class="weight-600" for="rol">
                            Localidad
                        </label>
                        <label class="form-control-label has-danger ml-2" id="msg-localidad"></label>
                        <input class="form-control" type="text" name="localidad" id="localidad">
                    </div>
                    <div class="form-group col-sm-12 col-md-4">
                        <label class="weight-600" for="rol">
                            Estado
                        </label>
                        <label class="form-control-label has-danger ml-2" id="msg-estado"></label>
                        <input class="form-control" type="text" name="estado" id="estado">
                    </div>
                    <div class="form-group col-sm-12 col-md-4">
                        <label class="weight-600" for="rol">
                            Pais
                        </label>
                        <label class="form-control-label has-danger ml-2" id="msg-pais"></label>
                        <input class="form-control" type="text" name="pais" id="pais">
                    </div>
                    <div class="col-12 text-right">
                        <button type="button" id="btnCrearCliente" class="btn btn-success">
                            CREAR CLIENTE <i class="icon-copy dw dw-checked"></i>
                        </button>
                    </div>  
                </form>
            </div>
        </div>
    </div>
</div>
@include('pages.clientes.modal_grupo')
@endsection
@section('scripts')
<script src="{{ asset('js/clientes.js') }}"></script>
@endsection