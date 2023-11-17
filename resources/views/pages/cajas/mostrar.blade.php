@extends('layouts.app')
@section('title', 'Unidades')
@section('content')
<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="title">
                        <h4 class="text-blue">Cajas</h4>
                    </div>
                    <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Inicio</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Cajas</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-md-6 col-sm-12 text-right">
                    <button type="button" class="btn btn-success" onclick="openModalCrearCaja();">
                        CREAR CAJA <i class="icon-copy dw dw-add"></i>
                    </button>
                </div>
            </div>
            <div class="card-box pd-30">
                <table class="data-table table hover nowrap mb-0">
                    <thead>
                        <tr>
                            <th class="col-1">ID</th>
                            <th class="col-4">Nombre</th>
                            <th class="col-4">Sucursal</th>
                            <th class="col-1 text-center">Estatus</th>
                            <th class="col-2 text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cajas as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->nombre }}</td>
                            <td>{{ $item->sucursal->nombre }}</td>
                            <td>
                                <label class="cl-switch cl-switch-large cl-switch-green">
                                    <input type="checkbox" id="{{ $item->id }}" onchange="ChangeStatusCaja(this)"
                                        @if($item->activo) checked @endif>
                                    <span class="switcher"></span>
                                </label>
                            </td>
                            <td class="text-center">
                                <button type="button" class="btn btn-info btn-circle btn-xl" id="{{ $item->id }}"
                                    onclick="openModalEditarCaja(this);">
                                    <i class="icon-copy dw dw-edit-1"></i>
                                </button>
                                <button type="button" class="btn btn-danger btn-circle btn-xl" id="{{ $item->id }}"
                                    onclick="DeleteCaja(this);">
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
@include('pages.cajas.crear')
@include('pages.cajas.editar')
@endsection
@section('scripts')
<script src="{{ asset('js/cajas.js') }}"></script>
@endsection