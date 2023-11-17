@extends('layouts.app')
@section('title', 'Impuestos')
@section('content')
<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="title">
                        <h4 class="text-blue">Impuestos</h4>
                    </div>
                    <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Inicio</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Impuestos</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-md-6 col-sm-12 text-right">
                    <a class="btn btn-success" href="{{ route('nuevo_impuesto') }}">
                        CREAR IMPUESTO <i class="icon-copy dw dw-add"></i>
                    </a>
                </div>
            </div>
            <div class="card-box pd-30">
                <table class="data-table table hover nowrap mb-0">
                    <thead>
                        <tr>
                            <th class="col-1">ID</th>
                            <th class="col-2">Nombre</th>
                            <th class="col-1">Impuesto</th>
                            <th class="col-1">Tras/Ret</th>
                            <th class="col-1">Tipo</th>
                            <th class="col-2">Cuenta Contable</th>
                            <th class="col-1 text-center">Estatus</th>
                            <th class="col-3 text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($impuestos as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->nombre }}</td>
                            <td>{{ $item->impuesto }}</td>
                            <td>{{ $item->desglose->nombre }}</td>
                            <td>{{ $item->tipo->nombre }}</td>
                            <td>{{ $item->cuenta_clave }}</td>
                            <td class="text-center">
                                <label class="cl-switch cl-switch-large cl-switch-green">
                                    <input type="checkbox" id="{{ $item->id }}" onchange="ChangeStatusImpuesto(this)"
                                        @if($item->activo) checked @endif>
                                    <span class="switcher"></span>
                                </label>
                            </td>
                            <td class="text-center">
                                <a class="btn btn-info btn-circle btn-xl" href="{{ url('impuestos/editar/' . $item->id) }}">
                                    <i class="icon-copy dw dw-edit-1"></i>
                                </a>
                                <button type="button" class="btn btn-danger btn-circle btn-xl" id="{{ $item->id }}"
                                    onclick="DeleteImpuesto(this);">
                                    <i class="icon-copy dw dw-delete-2"></i>
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script src="{{ asset('js/impuestos.js') }}"></script>
@endsection