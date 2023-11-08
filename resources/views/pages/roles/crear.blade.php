@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="title">
                        <h4>Roles</h4>
                    </div>
                    <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Inicio</a></li>
                            <li class="breadcrumb-item" aria-current="page"><a href="{{ route('roles') }}">Roles</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Crear</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="pd-20 card-box">
                <form id="FormCreateRol">
                    <div class="form-group">
                        <label class="weight-600" for="rol" style="font-size: 16px">
                            Nombre de Rol
                        </label>
                        <label class="form-control-label has-danger ml-2" id="msg-rol"></label>
                        <input class="form-control" type="text" name="rol" id="rol" oninput="validateFormRol();">
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3 col-sm-3">
                                <label class="form-control-label weight-600">
                                    Lista de Permisos
                                </label>
                            </div>
                            <div class="col-md-2 custom-control custom-checkbox mb-5">
                                <input type="checkbox" class="custom-control-input" id="btn_check_all_read">
                                <label class="custom-control-label" for="btn_check_all_read">
                                    Mostrar Todo
                                </label>
                            </div>
                            <div class="col-md-2 col-sm-2 custom-control custom-checkbox mb-5">
                                <input type="checkbox" class="custom-control-input" id="btn_check_all_create">
                                <label class="custom-control-label" for="btn_check_all_create">
                                    Crear Todo
                                </label>
                            </div>
                            <div class="col-md-2 col-sm-2 custom-control custom-checkbox mb-5">
                                <input type="checkbox" class="custom-control-input" id="btn_check_all_update">
                                <label class="custom-control-label" for="btn_check_all_update">
                                    Modificar Todo
                                </label>
                            </div>
                            <div class="col-md-2 col-sm-2 custom-control custom-checkbox mb-5">
                                <input type="checkbox" class="custom-control-input" id="btn_check_all_delete">
                                <label class="custom-control-label" for="btn_check_all_delete">
                                    Eliminar Todo
                                </label>
                            </div>
                        </div>
                        <hr class="mt-1 mb-2">
                        @foreach ($permisos as $item)
                        <div class="row">
                            <div class="col-md-3 col-sm-3">
                                <label class="form-control-label" for="rol">{{ $item->permiso }}</label>
                            </div>
                            <div class="col-md-2 col-sm-2 custom-control custom-checkbox mb-5">
                                <input type="checkbox" class="custom-control-input" id="customCheck1_{{ $item->id }}"
                                    name="read[]" value="{{ $item->id }}">
                                <label class="custom-control-label" for="customCheck1_{{ $item->id }}">
                                    Mostrar
                                </label>
                            </div>
                            <div class="col-md-2 col-sm-2 custom-control custom-checkbox mb-5">
                                <input type="checkbox" class="custom-control-input" id="customCheck2_{{ $item->id }}"
                                    name="create[]" value="{{ $item->id }}">
                                <label class="custom-control-label" for="customCheck2_{{ $item->id }}">
                                    Crear
                                </label>
                            </div>
                            <div class="col-md-2 col-sm-2 custom-control custom-checkbox mb-5">
                                <input type="checkbox" class="custom-control-input" id="customCheck3_{{ $item->id }}"
                                    name="update[]" value="{{ $item->id }}">
                                <label class="custom-control-label" for="customCheck3_{{ $item->id }}">
                                    Editar
                                </label>
                            </div>
                            <div class="col-md-2 col-sm-2 custom-control custom-checkbox mb-5">
                                <input type="checkbox" class="custom-control-input" id="customCheck4_{{ $item->id }}"
                                    name="delete[]" value="{{ $item->id }}">
                                <label class="custom-control-label" for="customCheck4_{{ $item->id }}">
                                    Eliminar
                                </label>
                            </div>
                        </div>
                        <hr class="mt-1 mb-2">
                        @endforeach
                    </div>
                    <div class="col-12 text-right">
                        <button type="submit" class="btn btn-success">
                            Guardar <i class="icon-copy dw dw-checked"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script src="{{ asset('js/auth/rol.js') }}"></script>
@endsection