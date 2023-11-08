@extends('layouts.app')
@section('title', 'Dashboard')
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
                    <a class="btn btn-success" href="{{ route('nuevo') }}">
                        CREAR <i class="icon-copy dw dw-add"></i>
                    </a>
                </div>
            </div>
            <div class="card-box mb-30">
                <table class="table hover nowrap">
                    <thead>
                        <tr>
                            <th class="col-1">ID</th>
                            <th class="col-4">Rol</th>
                            <th class="col-3">Actualizado</th>
                            <th class="col-2">Estatus</th>
                            <th class="col-2">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($roles as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->rol }}</td>
                            <td>{{ date_format($item->updated_at,"Y/m/d H:i:s"); }}</td>
                            <td>
                                <input type="checkbox" class="switch-btn" data-color="#28a745" @if ($item->activo)
                                checked @endif onchange="ChangeStatus(this);" id="{{ $item->id }}">
                            </td>
                            <td>
                                <a class="btn btn-info btn-circle btn-xl" href="{{ url('roles/editar/' . $item->id) }}">
                                    <i class="icon-copy dw dw-edit-1"></i>
                                </a>
                                <button class="btn btn-danger btn-circle btn-xl" type="button" id="{{ $item->id }}"
                                    onclick="DeleteRol(this);">
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