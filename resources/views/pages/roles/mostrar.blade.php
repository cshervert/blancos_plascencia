@extends('layouts.app')
@section('title', 'Roles')
@section('content')
<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="title">
                        <h4>Roles</h4>
                    </div>
                    <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Inicio</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Roles</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-md-6 col-sm-12 text-right">
                    <a class="btn btn-success" href="{{ route('nuevo_rol') }}">
                        CREAR ROL <i class="icon-copy dw dw-add"></i>
                    </a>
                </div>
            </div>
            <div class="card-box pd-30">
                <table class="table hover nowrap mb-0">
                    <thead>
                        <tr>
                            <th class="col-1">ID</th>
                            <th class="col-3">Rol</th>
                            <th class="col-3 text-center">Actualizado</th>
                            <th class="col-2 text-center">Estatus</th>
                            <th class="col-3 text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($roles as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->rol }}</td>
                            <td class="text-center">{{ date_format($item->updated_at,"d-M-Y H:i") }}</td>
                            <td class="text-center">
                                <label class="cl-switch cl-switch-large cl-switch-green">
                                    <input type="checkbox" id="{{ $item->id }}" onchange="ChangeStatusRol(this)" @if($item->activo) checked @endif>
                                    <span class="switcher"></span>
                                </label>
                            </td>
                            <td class="text-center">
                                <a class="btn btn-info btn-circle btn-xl" href="{{ url('roles/editar/' . $item->id) }}">
                                    <i class="icon-copy dw dw-edit-1"></i>
                                </a>
                                <button type="button" class="btn btn-danger btn-circle btn-xl" id="{{ $item->id }}" onclick="DeleteRol(this);">
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
<script src="{{ asset('js/auth/rol.js') }}"></script>
@endsection