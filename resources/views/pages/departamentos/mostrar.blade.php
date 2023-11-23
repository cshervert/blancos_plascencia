@extends('layouts.app')
@section('title', 'Departamentos')
@section('content')
<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="title">
                        <h4 class="text-blue">Departamentos</h4>
                    </div>
                    <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Inicio</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Departamentos</li>
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
                    <button type="button" class="btn btn-success mb-3" onclick="openModalCrearDepartamento();">
                        CREAR DEPARTAMENTO <i class="icon-copy dw dw-add"></i>
                    </button>
                </div>
            </div>
            <div class="card-box pd-20">
                <table class="data-table table hover nowrap mb-0">
                    <thead class="bg-light">
                        <tr>
                            <th class="col-1 text-uppercase">No.</th>
                            <th class="col-8 text-uppercase">Departamento</th>
                            <th class="col-1 text-uppercase text-center">Estatus</th>
                            <th class="col-2 text-uppercase text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($departamentos as $item)
                        <tr>
                            <td class="text-center">{{ $item->id }}</td>
                            <td>{{ $item->departamento }}</td>
                            <td class="text-center">
                                <label class="cl-switch cl-switch-large cl-switch-green">
                                    <input type="checkbox" id="{{ $item->id }}" onchange="ChangeStatusDepartamento(this)"
                                        @if($item->activo) checked @endif>
                                    <span class="switcher"></span>
                                </label>
                            </td>
                            <td class="text-center">
                                <button type="button" class="btn btn-info btn-circle btn-xl" id="{{ $item->id }}" onclick="openModalEditarDepartamento(this)">
                                    <i class="icon-copy dw dw-edit-1"></i>
                                </button>
                                <button type="button" class="btn btn-danger btn-circle btn-xl" id="{{ $item->id }}" onclick="DeleteDepartamento(this);">
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
@include('pages.departamentos.crear')
@include('pages.departamentos.editar')
@endsection
@section('scripts')
<script src="{{ asset('js/departamentos.js') }}"></script>
@endsection