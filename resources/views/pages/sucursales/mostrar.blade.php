@extends('layouts.app')
@section('title', 'Sucursales')
@section('content')
<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="title">
                        <h4 class="text-blue">Sucursales</h4>
                    </div>
                    <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Inicio</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Sucursales</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-md-6 col-sm-12 text-right">
                    <a class="btn btn-dark mb-3" href="{{ route('exportarSucursal') }}">
                        EXPORTAR <i class="icon-copy dw dw-download1 ml-1"></i>
                    </a>
                    <button class="btn btn-warning mb-3" data-toggle="modal" data-target="#importar-modal">
                        IMPORTAR <i class="icon-copy dw dw-upload1 ml-1"></i>
                    </button>
                    <a class="btn btn-success mb-3" href="{{ route('nueva_sucursal') }}">
                        CREAR SUCURSAL <i class="icon-copy dw dw-add ml-1"></i>
                    </a>
                    <div class="modal fade" id="importar-modal" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered ">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title text-blue" id="my-crear-unidad-modal">Importar Sucursales</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                        <i class="icon-copy fa fa-close" aria-hidden="true"></i>
                                    </button>
                                </div>
                                <form id="formImportarSucursales" enctype="multipart/form-data">
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="form-group col-md-12 mb-2 text-center">
                                                <label>Seleccionar Archivo</label>
							                    <input type="file" id="file" name="file" class="form-control-file form-control height-auto">                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">SALIR</button> 
                                        <button type="submit" id="btnCuenta" class="btn btn-success">
                                            IMPORTAR <i class="icon-copy dw dw-checked ml-1"></i>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-box pd-20">
                <table class="data-table table hover mb-0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th class="col-4">Nombre</th>
                            <th class="col-5">Información</th>
                            <th class="col-1 text-center">Estatus</th>
                            <th class="col-2 text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sucursales as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->nombre }}</td>
                            <td>
                                <p class="m-0"><b>Domicilio:</b> {{ $item->domicilio }} #{{ $item->numero_exterior}}</p>
                                <p class="m-0"><B>Teléfono:</B> {{ $item->telefono }}</p>
                                <p class="m-0"><B>Email:</B> {{ $item->email }}</p>
                            </td>
                            <td class="text-center">
                                <label class="cl-switch cl-switch-large cl-switch-green">
                                    <input type="checkbox" id="{{ $item->id }}" onchange="ChangeStatusSucursal(this)"
                                        @if($item->activo) checked @endif>
                                    <span class="switcher"></span>
                                </label>
                            </td>
                            <td class="text-center">
                                <a class="btn btn-info btn-circle btn-xl"
                                    href="{{ url('sucursales/editar/' . $item->id) }}">
                                    <i class="icon-copy dw dw-edit-1"></i>
                                </a>
                                <button type="button" class="btn btn-danger btn-circle btn-xl" id="{{ $item->id }}"
                                    onclick="DeleteSucursal(this);">
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
<script src="{{ asset('js/sucursal.js') }}"></script>
@endsection