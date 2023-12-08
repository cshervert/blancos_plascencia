@extends('layouts.app')
@section('title', 'Clientes')
@section('content')
<div class="main-container">
    <div class="pd-ltr-20">
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="title">
                    <h4 class="text-blue">Clientes</h4>
                </div>
                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Inicio</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Clientes</li>
                    </ol>
                </nav>
            </div>
            <div class="col-md-6 col-sm-12 text-right">
                <a class="btn btn-dark mb-3" href="{{ route('exportarClientes') }}">
                    EXPORTAR <i class="icon-copy dw dw-download1 ml-1"></i>
                </a>
                <button class="btn btn-warning mb-3" data-toggle="modal" data-target="#importar-modal">
                    IMPORTAR <i class="icon-copy dw dw-upload1 ml-1"></i>
                </button>
                <a class="btn btn-success mb-3" href="{{ route('nuevo_cliente') }}">
                    CREAR CLIENTE <i class="icon-copy dw dw-add"></i>
                </a>
                <div class="modal fade" id="importar-modal" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered ">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title text-blue" id="my-crear-unidad-modal">Importar Clientes</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                    <i class="icon-copy fa fa-close" aria-hidden="true"></i>
                                </button>
                            </div>
                            <form id="formImportarClientes" enctype="multipart/form-data">
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="form-group col-md-12 mb-2 text-center">
                                            <label>Seleccionar Archivo</label>
                                            <input type="file" id="file" name="file" class="form-control-file form-control height-auto">                                            </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">SALIR</button> 
                                    <button type="submit" id="btnCliente" class="btn btn-success">
                                        IMPORTAR <i class="icon-copy dw dw-checked ml-1"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-box pd-30">
            <table class="data-table table hover nowrap mb-0">
                <thead>
                    <tr>
                        <th class="col-1 text-uppercase text-center">ID</th>
                        <th class="col-2 text-uppercase text-center">Clave</th>
                        <th class="col-3 text-uppercase">Nombre</th>
                        <th class="col-3 text-uppercase">Telefono</th>
                        <th class="col-1 text-uppercase">Email</th>
                        <th class="col-1 text-uppercase text-center">Estatus</th>
                        <th class="col-2 text-uppercase text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($clientes as $item)
                    <tr>
                        <td class="text-center">{{ $item->id }}</td>
                        <td class="text-center">{{ $item->clave }}</td>
                        <td>{{ $item->nombre }}</td>
                        <td>{{ $item->telefono }}</td>
                        <td>{{ $item->email }}</td>
                        <td class="text-center">
                                <label class="cl-switch cl-switch-large cl-switch-green">
                                    <input type="checkbox" id="{{ $item->id }}" onchange="ChangeStatusCliente(this)"
                                        @if($item->activo) checked @endif>
                                    <span class="switcher"></span>
                                </label>
                            </td>
                        <td class="text-center">
                            <a class="btn btn-info btn-circle btn-xl" href="{{ url('clientes/editar/' . $item->id) }}">
                                <i class="icon-copy dw dw-edit-1"></i>
                            </a>
                            <button type="button" class="btn btn-danger btn-circle btn-xl" id="{{ $item->id }}" onclick="DeleteCliente(this);">
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
@endsection
@section('scripts')
<script src="{{ asset('js/clientes.js') }}"></script>
@endsection