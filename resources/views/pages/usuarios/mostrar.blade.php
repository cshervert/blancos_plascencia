@extends('layouts.app')
@section('title', 'Dashboard')
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
                            <li class="breadcrumb-item active" aria-current="page">Usuarios</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-md-6 col-sm-12 text-right">
                    <button class="btn btn-success" type="button">
                        AGREGAR <i class="icon-copy dw dw-add"></i>
                    </button>
                </div>
            </div>
            <div class="card-box mb-30">
                <table class="table hover nowrap">
                    <thead>
                        <tr>
                            <th class="">ID</th>
                            <th class="col-1">Usuario</th>
                            <th class="col-3">Nombre</th>
                            <th class="col-1">Celular</th>
                            <th class="col-1">Rol</th>
                            <th class="col-2">Sucursal</th>
                            <th class="col-1">status</th>
                            <th class="col-2 text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($usuarios as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->username }}</td>
                            <td>{{ $item->nombre }}</td>
                            <td>{{ $item->celular }}</td>
                            <td>{{ $item->rol->rol }}</td>
                            <td>{{ $item->sucursal->nombre }}</td>
                            <td>
                                <input type="checkbox" class="switch-btn" data-color="#28a745" @if ($item->activo)
                                checked @endif>
                            </td>
                            <td class="text-center">
                                <button class="btn btn-info btn-circle btn-xl" type="button">
                                    <i class="icon-copy dw dw-edit-1"></i>
                                </button>
                                <button class="btn btn-danger btn-circle btn-xl" type="button">
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