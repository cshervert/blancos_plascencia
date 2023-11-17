@extends('layouts.app')
@section('title', 'Crear Impuesto')
@section('content')
<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <div class="title">
                        <h4 class="text-blue">Crear Impuesto</h4>
                    </div>
                    <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Inicio</a></li>
                            <li class="breadcrumb-item" aria-current="page">
                                <a href="{{ route('impuestos') }}">Impuestos</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Crear</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-md-6 col-sm-12 text-right">
                    <a class="btn btn-secondary" href="{{ route('impuestos') }}">
                        REGRESAR <i class="icon-copy dw dw-curved-arrow1 ml-1"></i>
                    </a>
                </div>
            </div>
            <div class="pd-30 card-box">
                <form id="FormCreateImpuesto">
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label class="form-label" for="nombre">Nombre</label>
                            <label class="form-control-label has-danger ml-2" id="advertencia-nombre"></label>
                            <input class="form-control" type="text" name="nombre" id="nombre"
                                onkeyup="validateFormImpuesto()">
                        </div>
                        <div class="form-group col-md-3">
                            <label class="form-label" for="impuesto">Impuesto</label>
                            <label class="form-control-label has-danger ml-2" id="advertencia-impuesto"></label>
                            <input class="form-control text-center" type="number" name="impuesto" id="impuesto"
                                step="0.01" value="0" onkeyup="validateFormImpuesto()">
                        </div>
                        <div class="form-group col-md-2 text-center">
                            <label for="activo">Activo</label><br>
                            <label class="cl-switch cl-switch-large cl-switch-green">
                                <input type="checkbox" id="activo" name="activo" checked>
                                <span class="switcher"></span>
                            </label>
                        </div>
                        <div class="form-group col-md-2 text-center">
                            <label for="impreso">Impreso</label><br>
                            <label class="cl-switch cl-switch-large cl-switch-green">
                                <input type="checkbox" id="impreso" name="impreso" checked>
                                <span class="switcher"></span>
                            </label>
                        </div>
                        <div class="form-group col-md-2 text-center">
                            <label for="impuesto_local">Impuesto Local</label><br>
                            <label class="cl-switch cl-switch-large cl-switch-green">
                                <input type="checkbox" id="impuesto_local" name="impuesto_local">
                                <span class="switcher"></span>
                            </label>
                        </div>
                        <div class="form-group col-md-3">
                            <label class="form-label" for="desglose_impuesto">Desglose de Impuesto</label>
                            <select class="custom-select2 form-control" name="desglose_impuesto" style="width:100%;">
                                @foreach ($desglose as $item)
                                <option value="{{ $item->id }}">{{ $item->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label class="form-label" for="tipo_impuesto">Tipo de Impuesto</label>
                            <select class="custom-select2 form-control" id="tipo_impuesto" name="tipo_impuesto"
                                style="width:100%;">
                                @foreach ($tipos as $item)
                                <option value="{{ $item->id }}">{{ $item->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label class="form-label" for="orden">Orden</label>
                            <label class="form-control-label has-danger ml-2" id="advertencia-orden"></label>
                            <input class="form-control text-center" type="number" name="orden" id="orden" min="0"
                                value="0" oninput="validateFormImpuesto();">
                        </div>
                        <div class="form-group col-md-3 text-center">
                            <label for="aplicar_iva">Aplicar I.V.A a este impuesto</label><br>
                            <label class="cl-switch cl-switch-large cl-switch-green">
                                <input type="checkbox" id="aplicar_iva" name="aplicar_iva">
                                <span class="switcher"></span>
                            </label>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label" for="cuenta_contable">Cuenta Contable</label>
                            <input class="form-control" type="text" name="cuenta_contable" id="cuenta_contable">
                        </div>
                        <div class="form-group col-md-6 text-right mt-4">
                            <button type="submit" class="btn btn-success mt-2">
                                GUARDAR <i class="icon-copy dw dw-checked ml-1"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script src="{{ asset('js/impuestos.js') }}"></script>
@endsection