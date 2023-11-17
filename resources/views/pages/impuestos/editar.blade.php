@extends('layouts.app')
@section('title', 'Editar Impuesto')
@section('content')
<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <div class="title">
                        <h4 class="text-blue">Editar Impuesto</h4>
                    </div>
                    <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Inicio</a></li>
                            <li class="breadcrumb-item" aria-current="page">
                                <a href="{{ route('impuestos') }}">Impuestos</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Editar</li>
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
                <form id="FormEditImpuesto">
                    <div class="row">
                        <input type="hidden" name="id" value="{{ $impuesto->id }}">
                        <div class="form-group col-md-3">
                            <label class="form-label" for="nombre">Nombre</label>
                            <label class="form-control-label has-danger ml-2" id="advertencia-nombre"></label>
                            <input class="form-control" type="text" name="nombre" id="nombre"
                                value="{{ $impuesto->nombre }}" onkeyup="validateFormImpuesto()">
                        </div>
                        <div class="form-group col-md-3">
                            <label class="form-label" for="impuesto">Impuesto</label>
                            <label class="form-control-label has-danger ml-2" id="advertencia-impuesto"></label>
                            <input class="form-control text-center" type="number" name="impuesto" id="impuesto"
                                step="0.01" value="{{ $impuesto->impuesto }}" onkeyup="validateFormImpuesto()">
                        </div>
                        <div class="form-group col-md-2 text-center">
                            <label for="activo">Activo</label><br>
                            <label class="cl-switch cl-switch-large cl-switch-green">
                                <input type="checkbox" name="activo" {{ ($impuesto->activo) ? "checked" : ""}}
                                id="activo">
                                <span class="switcher"></span>
                            </label>
                        </div>
                        <div class="form-group col-md-2 text-center">
                            <label for="impreso">Impreso</label><br>
                            <label class="cl-switch cl-switch-large cl-switch-green">
                                <input type="checkbox" name="impreso" {{ ($impuesto->impreso) ? "checked" :"" }}
                                id="impreso">
                                <span class="switcher"></span>
                            </label>
                        </div>
                        <div class="form-group col-md-2 text-center">
                            <label for="impuesto_local">Impuesto Local</label><br>
                            <label class="cl-switch cl-switch-large cl-switch-green">
                                <input type="checkbox" id="impuesto_local" name="impuesto_local" {{
                                    ($impuesto->impuesto_local) ? "checked" : "" }}>
                                <span class="switcher"></span>
                            </label>
                        </div>
                        <div class="form-group col-md-3">
                            <label class="form-label" for="desglose_impuesto">Desglose de Impuesto</label>
                            <select class="custom-select2 form-control" name="desglose_impuesto" style="width:100%;">
                                @foreach ($desglose as $item)
                                <option value="{{ $item->id }}" @if($item->id == $impuesto->id_desglose_impuesto)
                                    selected @endif>
                                    {{ $item->nombre }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label class="form-label" for="tipo_impuesto">Tipo de Impuesto</label>
                            <select class="custom-select2 form-control" id="tipo_impuesto" name="tipo_impuesto"
                                style="width:100%;">
                                @foreach ($tipos as $item)
                                <option value="{{ $item->id }}" @if($item->id == $impuesto->id_tipo_impuesto)
                                    selected @endif>
                                    {{ $item->nombre }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label class="form-label" for="orden">Orden</label>
                            <label class="form-control-label has-danger ml-2" id="advertencia-orden"></label>
                            <input class="form-control text-center" type="number" name="orden" id="orden" min="0"
                                value="{{ $impuesto->orden }}" oninput="validateFormImpuesto();">
                        </div>
                        <div class="form-group col-md-3 text-center">
                            <label for="aplicar_iva">Aplicar I.V.A a este impuesto</label><br>
                            <label class="cl-switch cl-switch-large cl-switch-green">
                                <input type="checkbox" id="aplicar_iva" name="aplicar_iva" {{ ($impuesto->aplicar_iva) ?
                                "checked" :
                                "" }}>
                                <span class="switcher"></span>
                            </label>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label" for="cuenta_contable">Cuenta Contable</label>
                            <input class="form-control" type="text" name="cuenta_contable" id="cuenta_contable"
                                value="{{ $impuesto->cuenta_clave }}">
                        </div>
                        <div class="form-group col-md-6 text-right mt-4">
                            <button type="submit" class="btn btn-info mt-2">
                                ACTUALIZAR <i class="icon-copy dw dw-edit-2 ml-1"></i>
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