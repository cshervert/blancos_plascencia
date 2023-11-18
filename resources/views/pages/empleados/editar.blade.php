@extends('layouts.app')
@section('title', 'Editar Empleado')
@section('content')
<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <div class="title">
                        <h4 class="text-blue">Editar Empleado</h4>
                    </div>
                    <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Inicio</a></li>
                            <li class="breadcrumb-item" aria-current="page">
                                <a href="{{ route('empleados') }}">Empleados</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Editar ({{ $empleado->id }})</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-md-6 col-sm-12 text-right">
                    <a class="btn btn-secondary mb-3" href="{{ route('empleados') }}">
                        REGRESAR <i class="icon-copy dw dw-curved-arrow1 ml-1"></i>
                    </a>
                </div>
            </div>
            <div class="pd-30 card-box">
                <form id="FormEditEmpledo">
                    <div class="row">
                        <input type="hidden" name="id" value="{{ $empleado->id }}">
                        <div class="form-group col-md-6 col-lg-4">
                            <label class="form-label" for="alias">Alias</label>
                            <label class="form-control-label has-danger ml-2" id="advertencia-alias"></label>
                            <input class="form-control" type="text" name="alias" id="alias"
                                value="{{ $empleado->alias }}" onkeyup="validateFormEmpleado()">
                        </div>
                        <div class="form-group col-md-6 col-lg-4">
                            <label class="form-label" for="nombre">Nombre</label>
                            <label class="form-control-label has-danger ml-2" id="advertencia-nombre"></label>
                            <input class="form-control" type="text" name="nombre" id="nombre"
                                value="{{ $empleado->nombre }}" onkeyup="validateFormEmpleado()">
                        </div>
                        <div class="form-group col-md-6 col-lg-4">
                            <label class="form-label" for="direccion">Dirección</label>
                            <label class="form-control-label has-danger ml-2" id="advertencia-direccion"></label>
                            <input class="form-control" type="text" name="direccion" id="direccion"
                                value="{{ $empleado->direccion }}" onkeyup="validateFormEmpleado()">
                        </div>
                        <div class="form-group col-md-6 col-md-6 col-lg-3">
                            <label class="form-label" for="ciudad">Ciudad</label>
                            <label class="form-control-label has-danger ml-2" id="advertencia-ciudad"></label>
                            <input class="form-control" type="text" name="ciudad" id="ciudad"
                                value="{{ $empleado->ciudad }}" onkeyup="validateFormEmpleado()">
                        </div>
                        <div class="form-group col-md-6 col-lg-3">
                            <label class="form-label" for="nss">NSS</label>
                            <input class="form-control" type="text" name="nss" id="nss" value="{{ $empleado->nss }}">
                        </div>
                        <div class="form-group col-md-6 col-lg-3">
                            <label class="form-label" for="curp">CURP</label>
                            <input class="form-control" type="text" name="curp" id="curp" value="{{ $empleado->curp }}">
                        </div>
                        <div class="form-group col-md-6 col-lg-3">
                            <label class="form-label" for="telefono">Telefóno</label>
                            <input class="form-control" type="text" name="telefono" id="telefono"
                                value="{{ $empleado->telefono }}">
                        </div>

                        <div class="form-group col-md-6 col-lg-3">
                            <label class="form-label" for="celular">Celular</label>
                            <label class="form-control-label has-danger ml-2" id="advertencia-celular"></label>
                            <input class="form-control" type="text" name="celular" id="celular"
                                value="{{ $empleado->celular }}" onkeyup="validateFormEmpleado()">
                        </div>
                        <div class="form-group col-md-6 col-lg-3">
                            <label class="form-label" for="email">Email</label>
                            <label class="form-control-label has-danger ml-2" id="advertencia-email"></label>
                            <input class="form-control" type="text" name="email" id="email"
                                value="{{ $empleado->email }}" onkeyup="validateFormEmpleado()">
                        </div>
                        <div class="form-group col-md-6 col-lg-3">
                            <label class="form-label" for="comision">Comisión</label>
                            <label class="form-control-label has-danger ml-2" id="advertencia-comision"></label>
                            <input class="form-control text-center" type="text" name="comision" id="comision"
                                value="{{ $empleado->comision }}" onkeyup="validateFormEmpleado()">
                        </div>
                        <div class="form-group col-md-6 col-lg-3">
                            <label class="form-label" for="fecha_nacimiento">Fecha Nacimiento</label>
                            <input class="form-control text-center date-picker" type="text" name="fecha_nacimiento"
                                id="fecha_nacimiento" value="{{ ($empleado->fecha_nacimiento) ? date(" d-m-Y",
                                strtotime($empleado->fecha_nacimiento)) : '' }}">
                        </div>
                        <div class="form-group col-md-6 col-lg-3">
                            <label class="form-label" for="puesto">Puesto Trabajo</label>
                            <select class="custom-select2 form-control" name="puesto" style="width:100%;">
                                @foreach ($puestos as $item)
                                <option value="{{ $item->id }}" @if($item->id == $empleado->id_puesto) selected @endif>
                                    {{ $item->puesto }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-6 col-lg-4">
                            <label class="form-label" for="sucursal">Sucursal</label>
                            <select class="custom-select2 form-control" name="sucursal" style="width:100%;">
                                @foreach ($sucursales as $item)
                                <option value="{{ $item->id }}" @if($item->id == $empleado->id_sucursal) selected
                                    @endif>
                                    {{ $item->nombre }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-1 col-lg-2"></div>
                        <div class="form-group col-md-5 col-lg-3 mt-4">
                            <button type="submit" class="btn btn-info btn-block mt-2">
                                ACTUALIZAR <i class="icon-copy dw dw-edit-2 ml-1"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script src="{{ asset('js/empleados.js') }}"></script>
@endsection