@extends('layouts.app')
@section('title', 'Crear Rol')
@section('content')
<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <div class="title">
                        <h4>Sucursales</h4>
                    </div>
                    <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Inicio</a></li>
                            <li class="breadcrumb-item" aria-current="page">
                                <a href="{{ route('sucursales') }}">Mostrar</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Crear</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-md-6 col-sm-12 text-right">
                    <a class="btn btn-secondary" href="{{ route('sucursales') }}">
                        REGRESAR <i class="icon-copy dw dw-curved-arrow1 ml-1"></i>
                    </a>
                </div>
            </div>
            <div class="pd-30 card-box">
                <form id="FormCreateSucursal" class="row">
                    <div class="form-group col-md-6">
                        <label class="form-label" for="nombre">Nombre</label>
                        <label class="form-control-label has-danger ml-2" id="advertencia-nombre"></label>
                        <input class="form-control" type="text" name="nombre" id="nombre" onkeyup="validateFormSucursal()">
                    </div>
                    <div class="form-group col-md-6">
                        <label class="form-label" for="domicilio">Domicilio</label>
                        <label class="form-control-label has-danger ml-2" id="advertencia-domicilio"></label>
                        <input class="form-control" type="text" name="domicilio" id="domicilio" onkeyup="validateFormSucursal()">
                    </div>
                    <div class="form-group col-md-3">
                        <label class="form-label" for="numero_exterior">No. Ext.</label>
                        <input class="form-control" type="text" name="numero_exterior" id="numero_exterior">
                    </div>
                    <div class="form-group col-md-3">
                        <label class="form-label" for="numero_interior">No. Int.</label>
                        <input class="form-control" type="text" name="numero_interior" id="numero_interior">
                    </div>
                    <div class="form-group col-md-4">
                        <label class="form-label" for="colonia">Colonia</label>
                        <input class="form-control" type="text" name="colonia" id="colonia">
                    </div>
                    <div class="form-group col-md-2">
                        <label class="form-label" for="cp">CP</label>
                        <input class="form-control" type="text" name="cp" id="cp">
                    </div>
                    <div class="form-group col-md-3">
                        <label class="form-label" for="ciudad">Ciudad</label>
                        <label class="form-control-label has-danger ml-2" id="advertencia-ciudad"></label>
                        <input class="form-control" type="text" name="ciudad" id="ciudad" onkeyup="validateFormSucursal()">
                    </div>
                    <div class="form-group col-md-3">
                        <label class="form-label" for="estado">Estado</label>
                        <input class="form-control" type="text" name="estado" id="estado">
                    </div>
                    <div class="form-group col-md-6">
                        <label class="form-label" for="email">Email</label>
                        <label class="form-control-label has-danger ml-2" id="advertencia-email"></label>
                        <input class="form-control" type="text" name="email" id="email" onkeyup="validateFormSucursal()">
                    </div>
                    <div class="form-group col-md-6">
                        <label class="form-label" for="telefono">Teléfono</label>
                        <label class="form-control-label has-danger ml-2" id="advertencia-telefono"></label>
                        <input class="form-control" type="text" name="telefono" id="telefono" onkeyup="validateFormSucursal()">
                    </div>
                    <div class="form-group col-md-6">
                        <label class="form-label" for="celular">Celular</label>
                        <label class="form-control-label has-danger ml-2" id="advertencia-celular"></label>
                        <input class="form-control" type="text" name="celular" id="celular" onkeyup="validateFormSucursal()">
                    </div>
                    <div class="col-12 text-right">
                        <button type="submit" class="btn btn-success">
                            CREAR SUCURSAL <i class="icon-copy dw dw-checked ml-1"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script src="{{ asset('js/sucursal.js') }}"></script>
@endsection