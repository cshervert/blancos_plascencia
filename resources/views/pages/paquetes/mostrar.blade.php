@extends('layouts.app')
@section('title', 'Paquetes')
@section('content')
<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="title">
                        <h4 class="text-blue">
                            <i class="icon-copy dw dw-package mr-1"></i> Paquetes
                        </h4>
                    </div>
                    <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Inicio</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Paquetes</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-md-6 col-sm-12 text-right">
                    <button class="btn btn-dark mb-3">
                        EXPORTAR <i class="icon-copy dw dw-download1 ml-1"></i>
                    </button>
                    <button class="btn btn-warning mb-3">
                        IMPORTAR <i class="icon-copy dw dw-upload1 ml-1"></i>
                    </button>
                    <a class="btn btn-success mb-3" href="{{ route('nuevo_articulo') }}">
                        CREAR PAQUETE <i class="icon-copy dw dw-add"></i>
                    </a>
                </div>
            </div>
            <div class="card-box pd-20">
                <table class="data-table table hover nowrap mb-0">
                    <thead class="bg-light">
                        <tr>
                            <th class="col-1 text-uppercase tb-font-12">No.</th>
                            <th class="col-1 text-uppercase tb-font-12">Clave</th>
                            <th class="col-1 text-uppercase tb-font-12">Alterno</th>
                            <th class="col-4 text-uppercase tb-font-12">Descripción</th>
                            <th class="col-1 text-uppercase tb-font-12">Categoría</th>
                            <th class="col-1 text-uppercase tb-font-12">Departamento</th>
                            <th class="col-1 text-uppercase text-center tb-font-12">Estatus</th>
                            <th class="col-2 text-uppercase text-center tb-font-12">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($paquetes as $item)
                        <tr>
                            <td class="tb-font-12 text-center">{{ $item->id }}</td>
                            <td class="tb-font-12">{{ $item->clave }}</td>
                            <td class="tb-font-12">{{ $item->clave_alterna }}</td>
                            <td class="tb-font-12">{{ $item->descripcion }}</td>
                            <td class="tb-font-12">{{ $item->categoria->categoria }}</td>
                            <td class="tb-font-12">{{ $item->categoria->departamento->departamento }}</td>
                            <td class="text-center">
                                <label class="cl-switch cl-switch-large cl-switch-green">
                                    <input type="checkbox" id="{{ $item->id }}" onchange="ChangeStatusEmpleado(this)"
                                        @if($item->activo) checked @endif>
                                    <span class="switcher"></span>
                                </label>
                            </td>
                            <td class="tb-font-12 text-center">
                                <a class="btn btn-info btn-circle btn-xl"
                                    href="{{ url('empleados/editar/' . $item->id) }}">
                                    <i class="icon-copy dw dw-edit-1"></i>
                                </a>
                                <button type="button" class="btn btn-danger btn-circle btn-xl" id="{{ $item->id }}"
                                    onclick="DeleteEmpleado(this);">
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
<script src="{{ asset('js/paquetes.js') }}"></script>
@endsection