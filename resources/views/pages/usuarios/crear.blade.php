@extends('layouts.app')
@section('title', 'Crear Usuario')
@section('content')
<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <div class="title">
                        <h4>Usuarios</h4>
                    </div>
                    <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Inicio</a></li>
                            <li class="breadcrumb-item" aria-current="page">
                                <a href="{{ route('usuarios') }}">Mostrar</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Crear</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-md-6 col-sm-12 text-right">
                    <a class="btn btn-secondary" href="{{ route('usuarios') }}">
                        REGRESAR <i class="icon-copy dw dw-curved-arrow1 ml-1"></i>
                    </a>
                </div>
            </div>
            <div class="pd-30 card-box">
                <form id="FormCreateUsuario">
                    <h4 class="text-blue h5">Datos Generales</h4>
                    <hr class="mt-1">
                    <div class="row">
                        <div class="form-group col-md-5">
                            <label class="form-label" for="nombre">Nombre Completo</label>
                            <label class="form-control-label has-danger ml-2" id="advertencia-nombre"></label>
                            <input class="form-control" type="text" name="nombre" id="nombre" onkeyup="validateFormUsuario()">
                        </div>
                        <div class="form-group col-md-4">
                            <label class="form-label" for="domicilio">Domicilio</label>
                            <label class="form-control-label has-danger ml-2" id="advertencia-domicilio"></label>
                            <input class="form-control" type="text" name="domicilio" id="domicilio" onkeyup="validateFormUsuario()">
                        </div>
                        <div class="form-group col-md-3">
                            <label class="form-label" for="ciudad">Ciudad</label>
                            <label class="form-control-label has-danger ml-2" id="advertencia-ciudad"></label>
                            <input class="form-control" type="text" name="ciudad" id="ciudad" onkeyup="validateFormUsuario()">
                        </div>
                        <div class="form-group col-md-4">
                            <label class="form-label" for="telefono">Teléfono</label>
                            <label class="form-control-label has-danger ml-2" id="advertencia-telefono"></label>
                            <input class="form-control" type="text" name="telefono" id="telefono" onkeyup="validateFormUsuario()">
                        </div>
                        <div class="form-group col-md-4">
                            <label class="form-label" for="celular">Celular</label>
                            <label class="form-control-label has-danger ml-2" id="advertencia-celular"></label>
                            <input class="form-control" type="text" name="celular" id="celular" onkeyup="validateFormUsuario()">
                        </div>
                        <div class="form-group col-md-4">
                            <label class="form-label" for="email">Email</label>
                            <label class="form-control-label has-danger ml-2" id="advertencia-email"></label>
                            <input class="form-control" type="text" name="email" id="email" onkeyup="validateFormUsuario()">
                        </div>
                        <div class="form-group col-md-4">
                            <label class="form-label" for="sucursal">Sucursal</label>
                            <select class="custom-select2 form-control" name="sucursal" style="width:100%;">
                                @foreach ($sucursales as $item)
                                    <option value="{{ $item->id }}">{{ $item->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="form-label" for="rol">Rol</label>
                            <select class="custom-select2 form-control" name="rol" style="width:100%;">
                                @foreach ($roles as $item)
                                    <option value="{{ $item->id }}">{{ $item->rol }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="form-label" for="foto">Foto</label>
                            <input class="form-control-file" type="file" name="foto" id="foto">
                        </div>
                    </div>
                    <h4 class="text-blue h5 mt-3">Datos de Acceso</h4>
                    <hr class="mt-1">
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label class="form-label" for="usuario">Usuario</label>
                            <label class="form-control-label has-danger ml-2" id="advertencia-usuario"></label>
                            <input class="form-control" type="text" name="usuario" id="usuario" onkeyup="validateFormUsuario()">
                        </div>
                        <div class="form-group col-md-4">
                            <label class="form-label" for="password">Contraseña</label>
                            <label class="form-control-label has-danger ml-2" id="advertencia-password"></label>
                            <input class="form-control" type="password" name="password" id="password" onkeyup="validateFormUsuario()">
                        </div>
                        <div class="form-group col-md-4">
                            <label class="form-label" for="password-repetir">Repetir Contraseña</label>
                            <label class="form-control-label has-danger ml-2" id="advertencia-password-repetir"></label>
                            <input class="form-control" type="password" name="password-repetir" id="password-repetir" onkeyup="validateFormUsuario()">
                        </div>
                    </div>
                    <div class="text-right mt-3">
                        <button type="submit" class="btn btn-success">
                            CREAR USUARIO <i class="icon-copy dw dw-checked ml-1"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script src="{{ asset('js/auth/usuario.js') }}"></script>
@endsection