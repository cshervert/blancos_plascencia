@extends('layouts.app')
@section('title', 'Editar Usuario')
@section('content')
<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <div class="title">
                        <h4 class="text-blue">Editar Usuario</h4>
                    </div>
                    <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Inicio</a></li>
                            <li class="breadcrumb-item" aria-current="page"><a
                                    href="{{ route('usuarios') }}">Usuarios</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Editar</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-md-6 col-sm-12 text-right">
                    <a class="btn btn-secondary" href="{{ route('usuarios') }}">
                        REGRESAR <i class="icon-copy dw dw-curved-arrow1 ml-1"></i>
                    </a>
                </div>
            </div>
            <div class="card-box">
                <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs">
                        <li class="nav-item">
                            <a class="nav-link {{ (isset($section) && $section == 1) ? 'active' :'' }}"
                                id="pills-general-tab" data-toggle="pill" href="#pills-general" role="tab"
                                aria-controls="pills-general" aria-selected="true">
                                Datos Generales
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ (isset($section) && $section == 2) ? 'active' :'' }}"
                                id="pills-accesso-tab" data-toggle="pill" href="#pills-accesso" role="tab"
                                aria-controls="pills-accesso" aria-selected="false">
                                Datos de Accesso
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ (isset($section) && $section == 3) ? 'active' :'' }}"
                                id="pills-sucursales-tab" data-toggle="pill" href="#pills-sucursales" role="tab"
                                aria-controls="pills-sucursales" aria-selected="false">
                                Sucursales
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ (isset($section) && $section == 4) ? 'active' :'' }}"
                                id="pills-permisos-tab" data-toggle="pill" href="#pills-permisos" role="tab"
                                aria-controls="pills-permisos" aria-selected="false">
                                Permisos
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="tab-content" id="pills-tabContent">
                    <div class="card-body tab-pane {{ (isset($section) && $section == 1) ? 'fade show active' :'' }}"
                        id="pills-general" role="tabpanel" aria-labelledby="pills-general-tab">
                        <form id="FormEditUsuarioGeneral" class="pd-10 pt-0">
                            <div class="row">
                                <input type="hidden" name="id" value="{{ $usuario->id }}" id="id_usuario">
                                <div class="form-group col-md-5">
                                    <label class="form-label" for="nombre">Nombre Completo</label>
                                    <label class="form-control-label has-danger ml-2" id="advertencia-nombre"></label>
                                    <input class="form-control" type="text" name="nombre" id="nombre"
                                        value="{{ $usuario->nombre }}" onkeyup="validateFormEditUsuarioGeneral()">
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="form-label" for="domicilio">Domicilio</label>
                                    <label class="form-control-label has-danger ml-2"
                                        id="advertencia-domicilio"></label>
                                    <input class="form-control" type="text" name="domicilio" id="domicilio"
                                        value="{{ $usuario->direccion }}" onkeyup="validateFormEditUsuarioGeneral()">
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="form-label" for="ciudad">Ciudad</label>
                                    <label class="form-control-label has-danger ml-2" id="advertencia-ciudad"></label>
                                    <input class="form-control" type="text" name="ciudad" id="ciudad"
                                        value="{{ $usuario->ciudad }}" onkeyup="validateFormEditUsuarioGeneral()">
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="form-label" for="telefono">Teléfono</label>
                                    <label class="form-control-label has-danger ml-2" id="advertencia-telefono"></label>
                                    <input class="form-control" type="text" name="telefono" id="telefono"
                                        value="{{ $usuario->telefono }}" onkeyup="validateFormEditUsuarioGeneral()">
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="form-label" for="celular">Celular</label>
                                    <label class="form-control-label has-danger ml-2" id="advertencia-celular"></label>
                                    <input class="form-control" type="text" name="celular" id="celular"
                                        value="{{ $usuario->celular }}" onkeyup="validateFormEditUsuarioGeneral()">
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="form-label" for="email">Email</label>
                                    <label class="form-control-label has-danger ml-2" id="advertencia-email"></label>
                                    <input class="form-control" type="text" name="email" id="email"
                                        value="{{ $usuario->email }}" onkeyup="validateFormEditUsuarioGeneral()">
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="form-label" for="sucursal">Sucursal</label>
                                    <select class="custom-select2 form-control" name="sucursal" style="width:100%;">
                                        @foreach ($sucursales as $item)
                                        <option value="{{ $item->id }}" @if ($usuario->id_sucursal == $item->id)
                                            selected @endif>
                                            {{ $item->nombre }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="form-label" for="rol">Rol</label>
                                    <select class="custom-select2 form-control" name="rol" style="width:100%;">
                                        @foreach ($roles as $item)
                                        <option value="{{ $item->id }}" @if ($usuario->id_rol == $item->id)
                                            selected @endif>
                                            {{ $item->rol }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="form-label" for="foto">Foto</label>
                                    <input class="form-control-file" type="file" name="foto" id="foto" accept="image/*">
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="form-label" for="estatus">Estatus</label>
                                    <select class="custom-select2 form-control" name="estatus" style="width:100%;">
                                        <option value="1" @if ($usuario->activo == 1) selected @endif>Activo</option>
                                        <option value="0" @if ($usuario->activo == 0) selected @endif>Inactivo</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-4 mt-1">
                                    <button type="button" class="btn btn-dark mt-4" onclick="openModalFoto();">
                                        VER FOTO <i class="icon-copy dw dw-eye ml-1"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="text-right mt-3">

                                <button type="submit" class="btn btn-info">
                                    ACTUALIZAR DATOS GENERALES <i class="icon-copy dw dw-edit-2 ml-1"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="card-body tab-pane {{ (isset($section) && $section == 2) ? 'fade show active' :'' }}"
                        id="pills-accesso" role="tabpanel" aria-labelledby="pills-accesso-tab">
                        <form id="FormUpdateAcceso" class="pd-10 pt-0">
                            <h4 class="text-blue h5">Acceso</h4>
                            <hr class="mt-1">
                            <input type="hidden" name="id" value="{{ $usuario->id }}">
                            <div class="row">
                                <div class="form-group col-md-4 mb-0">
                                    <label class="form-label" for="usuario">Usuario</label>
                                    <label class="form-control-label has-danger ml-2" id="advertencia-usuario"></label>
                                    <input class="form-control" type="text" name="usuario" id="usuario"
                                        value="{{ $usuario->username }}" onkeyup="validateFormAceeso()">
                                </div>
                                <div class="form-group col-md-4 mb-0">
                                    <label class="form-label" for="password">Contraseña</label>
                                    <label class="form-control-label has-danger ml-2" id="advertencia-password"></label>
                                    <div class="input-group">
                                        <input class="form-control" type="password" name="password" id="password"
                                            onkeyup="validateFormAceeso()">
                                        <div class="input-group-append">
                                            <button class="btn btn-secondary" type="button" onclick="mostrarPassword()">
                                                <span id="icon_password" class="fa fa-eye-slash"></span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-4 mb-0">
                                    <label class="form-label" for="password-repetir">Repetir Contraseña</label>
                                    <label class="form-control-label has-danger ml-2"
                                        id="advertencia-password-repetir"></label>
                                    <div class="input-group">
                                        <input class="form-control" type="password" name="password-repetir"
                                            id="password-repetir" onkeyup="validateFormAceeso()">
                                        <div class="input-group-append">
                                            <button class="btn btn-secondary" type="button"
                                                onclick="mostrarPasswordRepetir()">
                                                <span id="icon_password_repetir" class="fa fa-eye-slash"></span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-right mt-3">
                                <button type="submit" class="btn btn-info">
                                    ACTUALIZAR ACCESOS <i class="icon-copy dw dw-edit-2 ml-1"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="card-body tab-pane {{ (isset($section) && $section == 3) ? 'fade show active' :'' }}"
                        id="pills-sucursales" role="tabpanel" aria-labelledby="pills-sucursales-tab">
                        <form id="FormUpdateSucursales" class="pd-10 pt-0">
                            <input type="hidden" name="id" value="{{ $usuario->id }}">
                            <div class="row">
                                <div class="col-md-4">
                                    <h4 class="text-blue h5">Asignar Sucursales</h4>
                                </div>
                                <div class="col-md-2 custom-control custom-checkbox mb-5 text-left">
                                    <input type="checkbox" class="custom-control-input" id="btn_check_all_sucursal">
                                    <label class="custom-control-label" for="btn_check_all_sucursal">Todas</label>
                                </div>
                            </div>
                            <hr class="mt-1 mb-2 col-6">
                            @foreach ($sucursalesActivas as $item)
                            <div class="row">
                                <div class="col-md-4">
                                    <label class="form-control-label" for="rol">{{ $item["nombre"] }}</label>
                                </div>
                                <div class="col-md-2 custom-control custom-checkbox mb-5 text-left">
                                    @if ($usuario->id_sucursal == $item['id'] )
                                    <input type="checkbox" class="custom-control-input" id="customCheck0_{{ $item['id'] }}" name="actual[]" checked disabled>
                                    <label class="custom-control-label" for="customCheck0_{{ $item['id'] }}">
                                        Actual
                                    </label>
                                    @else
                                    <input type="checkbox" class="custom-control-input" id="customCheck0_{{ $item['id'] }}" name="sucursales[]"
                                        value="{{ $item['id'] }}" {{ ($item['activo']) ? 'checked' : '' }}>
                                    <label class="custom-control-label" for="customCheck0_{{ $item['id'] }}">
                                        Asignar
                                    </label>
                                    @endif
                                </div>
                            </div>
                            <hr class="mt-1 mb-2 col-6">
                            @endforeach
                            <div class="text-right mt-3">
                                <button type="submit" class="btn btn-info">
                                    ACTUALIZAR SUCURSALES <i class="icon-copy dw dw-edit-2 ml-1"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="card-body tab-pane {{ (isset($section) && $section == 4) ? 'fade show active' :'' }}"
                        id="pills-permisos" role="tabpanel" aria-labelledby="pills-permisos-tab">
                        <form id="FormUpdatePermisosUsuario" class="pd-10 pt-0">
                            <input type="hidden" name="id" value="{{ $usuario->id }}">
                            <div class="row">
                                <div class="col-md-3 col-sm-3">
                                    <label class="form-control-label weight-600">
                                        Lista de Permisos
                                    </label>
                                </div>
                                <div class="col-md-2 col-sm-2 custom-control custom-checkbox mb-5">
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
                            @foreach ($permisosActivos as $item)
                            <div class="row">
                                <div class="col-md-3 col-sm-3">
                                    <label class="form-control-label" for="rol">{{ $item["permiso"] }}</label>
                                </div>
                                <div class="col-md-2 col-sm-2 custom-control custom-checkbox mb-5">
                                    <input type="checkbox" class="custom-control-input"
                                        id="customCheck1_{{ $item['id'] }}" name="read[]" value="{{ $item['id'] }}" {{
                                        (!empty($item['leer'])) ? 'checked' :'' }}>
                                    <label class="custom-control-label" for="customCheck1_{{ $item['id'] }}">
                                        Mostrar
                                    </label>
                                </div>
                                <div class="col-md-2 col-sm-2 custom-control custom-checkbox mb-5">
                                    <input type="checkbox" class="custom-control-input"
                                        id="customCheck2_{{ $item['id'] }}" name="create[]" value="{{ $item['id'] }}" {{
                                        (!empty($item['crear'])) ? 'checked' :'' }}>
                                    <label class="custom-control-label" for="customCheck2_{{ $item['id'] }}">
                                        Crear
                                    </label>
                                </div>
                                <div class="col-md-2 col-sm-2 custom-control custom-checkbox mb-5">
                                    <input type="checkbox" class="custom-control-input"
                                        id="customCheck3_{{ $item['id']}}" name="update[]" value="{{ $item['id']}}" {{
                                        (!empty($item['editar'])) ? 'checked' :'' }}>
                                    <label class="custom-control-label" for="customCheck3_{{ $item['id'] }}">
                                        Editar
                                    </label>
                                </div>
                                <div class="col-md-2 col-sm-2 custom-control custom-checkbox mb-5">
                                    <input type="checkbox" class="custom-control-input" id="customCheck4_{{ $item['id']
                                        }}" name="delete[]" value="{{$item['id'] }}" {{ (!empty($item['eliminar']))
                                        ? 'checked' :'' }}>
                                    <label class="custom-control-label" for="customCheck4_{{ $item['id'] }}">
                                        Eliminar
                                    </label>
                                </div>
                            </div>
                            <hr class="mt-1 mb-2">
                            @endforeach
                            <div class="text-right mt-3">
                                <button type="submit" class="btn btn-info">
                                    ACTUALIZAR PERMISOS <i class="icon-copy dw dw-edit-2 ml-1"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('pages.usuarios.components.img_modal')|
@endsection
@section('scripts')
<script src="{{ asset('js/auth/usuario.js') }}"></script>
@endsection