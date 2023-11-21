@extends('layouts.app')
@section('title', 'Crear Cliente')
@section('content')
<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <div class="title">
                        <h4>Clientes</h4>
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
                    <a class="btn btn-secondary" href="{{ route('clientes') }}">
                        REGRESAR <i class="icon-copy dw dw-return-1"></i>
                    </a>
                </div>
            </div>
            <div class="pd-30 card-box">
                <form id="formCreateCliente" class="row">
                    @csrf
                    <div class="form-group col-sm-12 col-md-8">
                        <label class="weight-600" for="rol" style="font-size: 16px">
                            Clave
                        </label>
                        <label class="form-control-label has-danger ml-2" id="msg-clave"></label>
                        <input class="form-control" type="text" name="clave" id="clave">
                    </div>
                    <div class="form-group col-sm-12 col-md-12">
                        <label class="weight-600 " for="rol" style="font-size: 16px">
                            Representante
                        </label>
                        <label class="form-control-label has-danger ml-2" id="msg-representante"></label>
                        <input class="form-control" type="text" onkeyup="validateFormCliente()" name="representante" id="representante">
                    </div>
                    <div class="form-group col-sm-12 col-md-12">
                        <label class="weight-600" for="rol" style="font-size: 16px">
                            Nombre
                        </label>
                        <label class="form-control-label has-danger ml-2" id="msg-nombre"></label>
                        <input class="form-control" type="text" onkeyup="validateFormCliente()" name="nombre" id="nombre">
                    </div>
                    <div class="form-group col-sm-12 col-md-6">
                        <label class="weight-600" for="rol" style="font-size: 16px">
                            RFC
                        </label>
                        <label class="form-control-label has-danger ml-2" id="msg-rfc"></label>
                        <input class="form-control" maxlength="13" onkeyup="validateFormCliente()" onkeyup="copiarRFC(this)" type="text" name="rfc" id="rfc">
                    </div>
                    <div class="form-group col-sm-12 col-md-6">
                        <label class="weight-600" for="rol" style="font-size: 16px">
                            CURP
                        </label>
                        <label class="form-control-label has-danger ml-2" id="msg-curp"></label>
                        <input class="form-control" maxlength="18" onkeyup="copiarCURP(this)" type="text" name="curp" id="curp">
                    </div>
                    <div class="form-group col-sm-12 col-md-6">
                        <label class="weight-600" for="rol" style="font-size: 16px">
                            Telefono
                        </label>
                        <label class="form-control-label has-danger ml-2" id="msg-telefono"></label>
                        <input class="form-control" type="text" onkeyup="validateFormCliente()" name="telefono" id="telefono">
                    </div>
                    <div class="form-group col-sm-12 col-md-6">
                        <label class="weight-600" for="rol" style="font-size: 16px">
                            Celular
                        </label>
                        <label class="form-control-label has-danger ml-2" id="msg-celular"></label>
                        <input class="form-control" type="text" onkeyup="validateFormCliente()" name="celular" id="celular">
                    </div>
                    <div class="form-group col-sm-12 col-md-12">
                        <label class="weight-600" for="rol" style="font-size: 16px">
                            Email
                        </label>
                        <label class="form-control-label has-danger ml-2" id="msg-email"></label>
                        <input class="form-control" type="text" onkeyup="validateFormCliente()" name="email" id="email">
                    </div>
                    <div class="form-group col-sm-12 col-md-4">
                        <label class="weight-600" for="rol" style="font-size: 16px">
                            No. de Precio
                        </label>
                        <label class="form-control-label has-danger ml-2" id="msg-noprecio"></label>
                        <!-- <input class="form-control" type="text" name="noprecio" id="noprecio"> -->
                        <select class="form-control" onchange="validateFormCliente()" name="noprecio" id="noprecio" >
                                <option value="0">Seleccionar precio</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                        </select>
                    </div>
                    <div class="form-group col-sm-12 col-md-4">
                        <label class="weight-600" for="rol" style="font-size: 16px">
                            Limite de Credito
                        </label>
                        <label class="form-control-label has-danger ml-2" id="msg-limite"></label>
                        <input class="form-control" type="text" name="limite" id="limite">
                    </div>
                    <div class="form-group col-sm-12 col-md-4">
                        <label class="weight-600" for="rol" style="font-size: 16px">
                            Dias de Credito
                        </label>
                        <label class="form-control-label has-danger ml-2" id="msg-dias"></label>
                        <input class="form-control" type="text" name="dias" id="dias">
                    </div>
                    <div class="form-group col-sm-12 col-md-4">
                        <label class="weight-600" for="rol" style="font-size: 16px">
                            Grupo
                        </label>
                        <label class="form-control-label has-danger ml-2" id="msg-grupo"></label>
                        <!-- <input class="form-control" type="hidden" value="0" name="grupoBand" id="grupoBand"> -->
                        <select class="form-control" name="grupo" id="grupo">
                            <option value="0">Seleccionar grupo</option>
                            @foreach ($grupos as $item)
                                <option value="{{$item->id}}">{{$item->nombre}}</option>
                            @endforeach
                        </select>
                    </div>   
                    <div class="form-group col-sm-12 col-md-4">       
                        <div class="form-group row mt-4 pl-3">
                            <button class="btn btn-success mt-2" data-toggle="modal" data-target="#grupo-modal" type="button">
                                Nuevo Grupo <i class="icon-copy dw dw-add"></i>
                            </button>
                        </div>                                   
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
                        <input class="form-control" type="text" onkeyup="validateFormCliente()" name="razon" id="razon">
                    </div>
                    <div class="form-group col-sm-12 col-md-6">
                        <label class="weight-600" for="rol" style="font-size: 16px">
                            RFC
                        </label>
                        <label class="form-control-label has-danger ml-2" id="msg-rfcfactura"></label>
                        <input class="form-control" maxlength="13" onkeyup="validateFormCliente()" type="text" name="rfcfactura" id="rfcfactura">
                    </div>
                    <div class="form-group col-sm-12 col-md-6">
                        <label class="weight-600" for="rol" style="font-size: 16px">
                            CURP
                        </label>
                        <label class="form-control-label has-danger ml-2" id="msg-curpfactura"></label>
                        <input class="form-control" maxlength="18" type="text" name="curpfactura" id="curpfactura">
                    </div>
                    <div class="form-group col-sm-12 col-md-6">
                        <label class="weight-600" for="rol" style="font-size: 16px">
                            Domicilio
                        </label>
                        <label class="form-control-label has-danger ml-2" id="msg-domicilio"></label>
                        <input class="form-control" type="text" onkeyup="validateFormCliente()" name="domicilio" id="domicilio">
                    </div>
                    <div class="form-group col-sm-12 col-md-3">
                        <label class="weight-600" for="rol" style="font-size: 16px">
                            No. Exterior
                        </label>
                        <label class="form-control-label has-danger ml-2" id="msg-exterior"></label>
                        <input class="form-control" type="text" onkeyup="validateFormCliente()" name="exterior" id="exterior">
                    </div>
                    <div class="form-group col-sm-12 col-md-3">
                        <label class="weight-600" for="rol" style="font-size: 16px">
                            No. Interior
                        </label>
                        <label class="form-control-label has-danger ml-2" id="msg-interior"></label>
                        <input class="form-control" type="text" name="interior" id="interior">
                    </div>
                    <div class="form-group col-sm-12 col-md-6">
                        <label class="weight-600" for="rol" style="font-size: 16px">
                            Colonia
                        </label>
                        <label class="form-control-label has-danger ml-2" id="msg-colonia"></label>
                        <input class="form-control" type="text" onkeyup="validateFormCliente()" name="colonia" id="colonia">
                    </div>
                    <div class="form-group col-sm-12 col-md-2">
                        <label class="weight-600" for="rol" style="font-size: 16px">
                            C.P.
                        </label>
                        <label class="form-control-label has-danger ml-2" id="msg-cp"></label>
                        <input class="form-control" type="text" onkeyup="validateFormCliente()" name="cp" id="cp">
                    </div>
                    <div class="form-group col-sm-12 col-md-4">
                        <label class="weight-600" for="rol" style="font-size: 16px">
                            Ciudad
                        </label>
                        <label class="form-control-label has-danger ml-2" id="msg-ciudad"></label>
                        <input class="form-control" type="text" name="ciudad" id="ciudad">
                    </div>
                    <div class="form-group col-sm-12 col-md-4">
                        <label class="weight-600" for="rol" style="font-size: 16px">
                            Localidad
                        </label>
                        <label class="form-control-label has-danger ml-2" id="msg-localidad"></label>
                        <input class="form-control" type="text" name="localidad" id="localidad">
                    </div>
                    <div class="form-group col-sm-12 col-md-4">
                        <label class="weight-600" for="rol" style="font-size: 16px">
                            Estado
                        </label>
                        <label class="form-control-label has-danger ml-2" id="msg-estado"></label>
                        <input class="form-control" type="text" name="estado" id="estado">
                    </div>
                    <div class="form-group col-sm-12 col-md-4">
                        <label class="weight-600" for="rol" style="font-size: 16px">
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
                    <div class="modal" id="grupo-modal" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="login-box bg-white">
                                    <div class="login-title">
                                        <h2 class="text-center text-primary">Agregar Nuevo Grupo</h2>
                                    </div>
                                    <form id="formCuenta">
                                        <div class="input-group custom">
                                            <input type="text" name="nombreGrupo" id="nombreGrupo" class="form-control form-control-lg" placeholder="Nombre">
                                        </div>                                                                         
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary text-right" data-dismiss="modal">Cerrar</button> 
                                            <button type="button" id="btnGrupo" class="btn btn-success">Agregar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
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