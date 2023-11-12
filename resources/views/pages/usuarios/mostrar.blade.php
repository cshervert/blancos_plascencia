@extends('layouts.app')
@section('title', 'Usuarios')
@section('content')
<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="title">
                        <h4>Usuarios</h4>
                    </div>
                    <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Inicio</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Mostrar</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-md-6 col-sm-12 text-right">
                    <a class="btn btn-success" href="{{ route('nuevo_usuario') }}">
                        CREAR USUARIO <i class="icon-copy dw dw-add ml-1"></i>
                    </a>
                </div>
            </div>
            <div class="card-box pd-20">
                <table class="data-table table hover mb-0">
                    <thead>
                        <tr>
                            <th class="col-1">ID</th>
                            <th class="col-1">Usuario</th>
                            <th class="col-3">Nombre</th>
                            <th class="col-1">Rol</th>
                            <th class="col-3">Sucursal</th>
                            <th class="col-1">Estatus</th>
                            <th class="col-2">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($usuarios as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->username }}</td>
                            <td>{{ $item->nombre }}</td>
                            <td>{{ $item->rol->rol }}</td>
                            <td>{{ $item->sucursal->nombre }}</td>
                            <td class="text-center">
                                <label class="cl-switch cl-switch-large cl-switch-green">
                                    <input type="checkbox" id="{{ $item->id }}" onchange="ChangeStatusUsuario(this)" @if($item->activo) checked @endif>
                                    <span class="switcher"></span>
                                </label>
                            </td>
                            <td class="text-center">
                                <a class="btn btn-info btn-circle btn-xl" href="{{ url('usuarios/editar/' . $item->id) }}">
                                    <i class="icon-copy dw dw-edit-1"></i>
                                </a>
                                <button type="button" class="btn btn-danger btn-circle btn-xl" id="{{ $item->id }}" onclick="DeleteUsuario(this);">
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
<script src="{{ asset('js/auth/usuario.js') }}"></script>
@endsection