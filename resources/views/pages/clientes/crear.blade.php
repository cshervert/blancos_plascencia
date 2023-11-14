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
                <form id="FormCreateRol" class="row">
                    @csrf
                    <div class="form-group col-sm-12 col-md-12">
                        <label class="weight-600 " for="rol" style="font-size: 16px">
                            Representante
                        </label>
                        <label class="form-control-label has-danger ml-2" id="msg-representante"></label>
                        <input class="form-control" type="text" name="representante" id="representante" oninput="validateFormRol();">
                    </div>
                    <div class="form-group col-sm-12 col-md-12">
                        <label class="weight-600" for="rol" style="font-size: 16px">
                            Nombre
                        </label>
                        <label class="form-control-label has-danger ml-2" id="msg-nombre"></label>
                        <input class="form-control" type="text" name="nombre" id="nombre" oninput="validateFormRol();">
                    </div>
                    <div class="form-group col-sm-12 col-md-6">
                        <label class="weight-600" for="rol" style="font-size: 16px">
                            RFC
                        </label>
                        <label class="form-control-label has-danger ml-2" id="msg-rfc"></label>
                        <input class="form-control" type="text" name="rfc" id="rfc" oninput="validateFormRol();">
                    </div>
                    <div class="form-group col-sm-12 col-md-6">
                        <label class="weight-600" for="rol" style="font-size: 16px">
                            CURP
                        </label>
                        <label class="form-control-label has-danger ml-2" id="msg-curp"></label>
                        <input class="form-control" type="text" name="curp" id="curp" oninput="validateFormRol();">
                    </div>
                    <div class="form-group col-sm-12 col-md-6">
                        <label class="weight-600" for="rol" style="font-size: 16px">
                            Telefono
                        </label>
                        <label class="form-control-label has-danger ml-2" id="msg-telefono"></label>
                        <input class="form-control" type="text" name="telefono" id="telefono" oninput="validateFormRol();">
                    </div>
                    <div class="form-group col-sm-12 col-md-6">
                        <label class="weight-600" for="rol" style="font-size: 16px">
                            Celular
                        </label>
                        <label class="form-control-label has-danger ml-2" id="msg-celular"></label>
                        <input class="form-control" type="text" name="celular" id="celular" oninput="validateFormRol();">
                    </div>
                    <div class="form-group col-sm-12 col-md-12">
                        <label class="weight-600" for="rol" style="font-size: 16px">
                            Email
                        </label>
                        <label class="form-control-label has-danger ml-2" id="msg-email"></label>
                        <input class="form-control" type="text" name="email" id="email" oninput="validateFormRol();">
                    </div>
                    <div class="form-group col-sm-12 col-md-4">
                        <label class="weight-600" for="rol" style="font-size: 16px">
                            No. de Precio
                        </label>
                        <label class="form-control-label has-danger ml-2" id="msg-noprecio"></label>
                        <input class="form-control" type="text" name="noprecio" id="noprecio" oninput="validateFormRol();">
                    </div>
                    <div class="form-group col-sm-12 col-md-4">
                        <label class="weight-600" for="rol" style="font-size: 16px">
                            Limite de Credito
                        </label>
                        <label class="form-control-label has-danger ml-2" id="msg-limite"></label>
                        <input class="form-control" type="text" name="limite" id="limite" oninput="validateFormRol();">
                    </div>
                    <div class="form-group col-sm-12 col-md-4">
                        <label class="weight-600" for="rol" style="font-size: 16px">
                            Dias de Credito
                        </label>
                        <label class="form-control-label has-danger ml-2" id="msg-dias"></label>
                        <input class="form-control" type="text" name="dias" id="dias" oninput="validateFormRol();">
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
                        <input class="form-control" type="text" name="razon" id="razon" oninput="validateFormRol();">
                    </div>
                    <div class="form-group col-sm-12 col-md-6">
                        <label class="weight-600" for="rol" style="font-size: 16px">
                            RFC
                        </label>
                        <label class="form-control-label has-danger ml-2" id="msg-rfc"></label>
                        <input class="form-control" type="text" name="rfc" id="rfc" oninput="validateFormRol();">
                    </div>
                    <div class="form-group col-sm-12 col-md-6">
                        <label class="weight-600" for="rol" style="font-size: 16px">
                            CURP
                        </label>
                        <label class="form-control-label has-danger ml-2" id="msg-curp"></label>
                        <input class="form-control" type="text" name="curp" id="curp" oninput="validateFormRol();">
                    </div>
                    <div class="form-group col-sm-12 col-md-6">
                        <label class="weight-600" for="rol" style="font-size: 16px">
                            Domicilio
                        </label>
                        <label class="form-control-label has-danger ml-2" id="msg-domicilio"></label>
                        <input class="form-control" type="text" name="domicilio" id="domicilio" oninput="validateFormRol();">
                    </div>
                    <div class="form-group col-sm-12 col-md-3">
                        <label class="weight-600" for="rol" style="font-size: 16px">
                            No. Interior
                        </label>
                        <label class="form-control-label has-danger ml-2" id="msg-interior"></label>
                        <input class="form-control" type="text" name="interior" id="interior" oninput="validateFormRol();">
                    </div>
                    <div class="form-group col-sm-12 col-md-3">
                        <label class="weight-600" for="rol" style="font-size: 16px">
                            No. Exterior
                        </label>
                        <label class="form-control-label has-danger ml-2" id="msg-exterior"></label>
                        <input class="form-control" type="text" name="exterior" id="exterior" oninput="validateFormRol();">
                    </div>
                    <div class="form-group col-sm-12 col-md-6">
                        <label class="weight-600" for="rol" style="font-size: 16px">
                            Colonia
                        </label>
                        <label class="form-control-label has-danger ml-2" id="msg-colonia"></label>
                        <input class="form-control" type="text" name="colonia" id="colonia" oninput="validateFormRol();">
                    </div>
                    <div class="form-group col-sm-12 col-md-2">
                        <label class="weight-600" for="rol" style="font-size: 16px">
                            C.P.
                        </label>
                        <label class="form-control-label has-danger ml-2" id="msg-cp"></label>
                        <input class="form-control" type="text" name="cp" id="cp" oninput="validateFormRol();">
                    </div>
                    <div class="form-group col-sm-12 col-md-4">
                        <label class="weight-600" for="rol" style="font-size: 16px">
                            Ciudad
                        </label>
                        <label class="form-control-label has-danger ml-2" id="msg-ciudad"></label>
                        <input class="form-control" type="text" name="ciudad" id="ciudad" oninput="validateFormRol();">
                    </div>
                    <div class="form-group col-sm-12 col-md-4">
                        <label class="weight-600" for="rol" style="font-size: 16px">
                            Localidad
                        </label>
                        <label class="form-control-label has-danger ml-2" id="msg-localidad"></label>
                        <input class="form-control" type="text" name="localidad" id="localidad" oninput="validateFormRol();">
                    </div>
                    <div class="form-group col-sm-12 col-md-4">
                        <label class="weight-600" for="rol" style="font-size: 16px">
                            Estado
                        </label>
                        <label class="form-control-label has-danger ml-2" id="msg-estado"></label>
                        <input class="form-control" type="text" name="estado" id="estado" oninput="validateFormRol();">
                    </div>
                    <div class="form-group col-sm-12 col-md-4">
                        <label class="weight-600" for="rol" style="font-size: 16px">
                            Pais
                        </label>
                        <label class="form-control-label has-danger ml-2" id="msg-pais"></label>
                        <input class="form-control" type="text" name="pais" id="pais" oninput="validateFormRol();">
                    </div>
                    <div class="col-12 text-right">
                        <button type="submit" class="btn btn-success">
                            CREAR CLIENTE <i class="icon-copy dw dw-checked"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script src="{{ asset('js/cliente.js') }}"></script>
@endsection