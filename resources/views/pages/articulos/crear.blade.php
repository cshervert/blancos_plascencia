@extends('layouts.app')
@section('title', 'Crear Articulo')
@section('content')
<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <div class="title">
                        <h4 class="text-blue">Crear Articulo</h4>
                    </div>
                    <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Inicio</a></li>
                            <li class="breadcrumb-item" aria-current="page">
                                <a href="{{ route('articulos') }}">Artículos</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Crear</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-md-6 col-sm-12 text-right">
                    <button class="btn btn-dark mb-3" onclick="GenerarClave();">
                        GENERAR CLAVE <i class="icon-copy dw dw-key1 ml-1"></i>
                    </button>
                    <a class="btn btn-secondary mb-3" href="{{ route('articulos') }}">
                        REGRESAR <i class="icon-copy dw dw-curved-arrow1 ml-1"></i>
                    </a>
                </div>
            </div>
            <div class="pd-30 card-box">
                <form id="FormCreateArticulo">
                    <h6 class="text-blue mb-2 text-uppercase">Datos Generales</h6>
                    <hr>
                    <div class="row">
                        <div class="form-group col-md-6 col-lg-3">
                            <label class="form-label" for="clave">Clave</label>
                            <label class="form-control-label has-danger ml-2" id="advertencia-clave"></label>
                            <input class="form-control text-center" type="text" name="clave" id="clave"
                                onkeyup="validateFormArticulo()">
                        </div>
                        <div class="form-group col-md-6 col-lg-3">
                            <label class="form-label" for="clave_alterna">Clave Alterna</label>
                            <label class="form-control-label has-danger ml-2" id="advertencia-clave_alterna"></label>
                            <input class="form-control text-center" type="text" name="clave_alterna" id="clave_alterna"
                                onkeyup="validateFormArticulo()">
                        </div>
                        <div class="form-group col-md-6 col-lg-6">
                            <label class="form-label" for="descripcion">Descripción</label>
                            <label class="form-control-label has-danger ml-2" id="advertencia-descripcion"></label>
                            <input class="form-control" type="text" name="descripcion" id="descripcion"
                                onkeyup="validateFormArticulo()">
                        </div>
                        <div class="form-group col-md-6 col-lg-5">
                            <label class="form-label" for="departamento">Departamento</label>
                            <div class="input-group mb-0">
                                <select class="custom-select2 form-control" name="departamento" id="departamento"
                                    style="width:85%;" onchange="searchCategoria();">
                                    @foreach ($departamentos as $item)
                                    <option value="{{ $item->id }}">{{ $item->departamento }}</option>
                                    @endforeach
                                </select>
                                <div class="input-group-append">
                                    <button class="btn btn-success" type="button" onclick="openModalCrearDepartamento();">
                                        <i class="icon-copy dw dw-add"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-6 col-lg-5">
                            <label class="form-label" for="categoria">Categoría</label>
                            <div class="input-group mb-0">
                                <select class="custom-select2 form-control" name="categoria" id="categoria"
                                    style="width:85%;">
                                    @foreach ($categorias as $item)
                                    <option value="{{ $item->id }}">{{ $item->categoria }}</option>
                                    @endforeach
                                </select>
                                <div class="input-group-append">
                                    <button class="btn btn-success" type="button" onclick="openModalCrearCategoria();">
                                        <i class="icon-copy dw dw-add"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-6 col-lg-2 text-center">
                            <label for="servicio">¿Es servicio?</label><br>
                            <label class="cl-switch cl-switch-large cl-switch-green">
                                <input type="checkbox" id="servicio" name="servicio">
                                <span class="switcher"></span>
                            </label>
                        </div>
                        <div class="form-group col-md-6 col-lg-5">
                            <label class="form-label" for="unidad_compra">Unidad de Compra</label>
                            <div class="input-group mb-0">
                                <select class="custom-select2 form-control" name="unidad_compra" id="unidad_compra"
                                    style="width:85%;">
                                    @foreach ($unidades as $item)
                                    <option value="{{ $item->id }}">{{ $item->unidad }}</option>
                                    @endforeach
                                </select>
                                <div class="input-group-append">
                                    <button class="btn btn-success" type="button" onclick="openModalCrearUnidad();">
                                        <i class="icon-copy dw dw-add"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-6 col-lg-4">
                            <label class="form-label" for="unidad_venta">Unidad de Venta</label>
                            <select class="custom-select2 form-control" name="unidad_venta" id="unidad_venta"
                                style="width:100%;">
                                @foreach ($unidades as $item)
                                <option value="{{ $item->id }}">{{ $item->unidad }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-6 col-md-6 col-lg-3">
                            <label class="form-label" for="factor">Factor</label>
                            <label class="form-control-label has-danger ml-2" id="advertencia-factor"></label>
                            <input class="form-control text-center" type="text" name="factor" id="factor" value="1"
                                onkeyup="validateFormEmpleado()">
                        </div>
                    </div>
                    <h6 class="text-blue text-uppercase">Precios de venta</h6>
                    <hr>
                    <div class="row border-dark">
                        <div class="col-lg-3">
                            @foreach ($impuestos as $item)
                            <div class="row mb-2">
                                <div class="col-md-3 col-lg-6 text-center">
                                    <label class="form-control-label" for="rol">{{ $item->nombre }}</label>
                                </div>
                                <div class="col-md-2 col-lg-6 custom-control custom-checkbox mb-5">
                                    <input type="checkbox" class="custom-control-input"
                                        id="customCheck1_{{ $item->id }}" name="read[]" value="{{ $item->id }}">
                                    <label class="custom-control-label" for="customCheck1_{{ $item->id }}"></label>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="col-lg-5">
                            <div class="row">
                                <div class="form-group col-md-6 col-lg-7">
                                    <label class="form-label" for="precio_compra">Precio de Compra</label>
                                    <input class="form-control" type="text" name="precio_compra" id="precio_compra">
                                    <label for=""> X PZA</label>
                                </div>
                                <div class="form-group col-md-6 col-lg-5 text-center">
                                    <label for="neto">Neto</label><br>
                                    <label class="cl-switch cl-switch-large cl-switch-green">
                                        <input type="checkbox" id="neto" name="neto">
                                        <span class="switcher"></span>
                                    </label>
                                </div>
                                <div class="form-group col-md-6 col-lg-12">
                                    <label class="form-label" for="precio_compra">Precio de Compra Sin impuesto</label>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <input class="form-control" type="text" name="precio_compra"
                                                id="precio_compra">
                                            <label for="">X PZA</label>
                                        </div>
                                        <div class="col-lg-6">
                                            <input class="form-control" type="text" name="precio_compra"
                                                id="precio_compra">
                                            <label for="">X PZA</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="row">
                                <div class="form-group col-md-6 col-lg-12">
                                    <label class="form-label" for="precio_compra">Precio de Compra Promedio</label>
                                    <input class="form-control" type="text" name="precio_compra" id="precio_compra">
                                    <label for=""></label>
                                </div>
                                <div class="form-group col-md-6 col-lg-12">
                                    <label class="form-label" for="precio_compra">Precio de Compra Promedio Sin
                                        impuesto</label>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <input class="form-control" type="text" name="precio_compra"
                                                id="precio_compra">
                                            <label for=""></label>
                                        </div>
                                        <div class="col-lg-6">
                                            <input class="form-control" type="text" name="precio_compra"
                                                id="precio_compra">
                                            <label for=""></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <table class="table">
                        <tbody>
                            <tr>
                                <th class="col-2"></th>
                                <th class="col-2">Precio Publico</th>
                                <th class="col-2">Precio Vendedor</th>
                                <th class="col-2">Precio Cliente</th>
                                <th class="col-2">Precio Promocion</th>
                            </tr>
                            <tr>
                                <th>Utilidad %</th>
                                <td>
                                    <input class="form-control text-center" type="number" name="utilidad_precio1"
                                        id="utilidad_precio1" value="0">
                                </td>
                                <td>
                                    <input class="form-control text-center" type="number" name="utilidad_precio1"
                                        id="utilidad_precio1" value="0">
                                </td>
                                <td>
                                    <input class="form-control text-center" type="number" name="utilidad_precio1"
                                        id="utilidad_precio1" value="0">
                                </td>
                                <td>
                                    <input class="form-control text-center" type="number" name="utilidad_precio1"
                                        id="utilidad_precio1" value="0">
                                </td>
                            </tr>
                            <tr>
                                <th>Precio Venta</th>
                                <td>
                                    <input class="form-control text-center" type="number" name="utilidad_precio1"
                                        id="utilidad_precio1" value="0">
                                </td>
                                <td>
                                    <input class="form-control text-center" type="number" name="utilidad_precio1"
                                        id="utilidad_precio1" value="0">
                                </td>
                                <td>
                                    <input class="form-control text-center" type="number" name="utilidad_precio1"
                                        id="utilidad_precio1" value="0">
                                </td>
                                <td>
                                    <input class="form-control text-center" type="number" name="utilidad_precio1"
                                        id="utilidad_precio1" value="0">
                                </td>
                            </tr>
                            <tr>
                                <th>Precio Venta Neto</th>
                                <td>
                                    <input class="form-control text-center" type="number" name="utilidad_precio1"
                                        id="utilidad_precio1" value="0">
                                </td>
                                <td>
                                    <input class="form-control text-center" type="number" name="utilidad_precio1"
                                        id="utilidad_precio1" value="0">
                                </td>
                                <td>
                                    <input class="form-control text-center" type="number" name="utilidad_precio1"
                                        id="utilidad_precio1" value="0">
                                </td>
                                <td>
                                    <input class="form-control text-center" type="number" name="utilidad_precio1"
                                        id="utilidad_precio1" value="0">
                                </td>
                            </tr>
                            <tr>
                                <th>Unidad por Mayoreo</th>
                                <td>
                                    <input class="form-control text-center" type="number" name="utilidad_precio1"
                                        id="utilidad_precio1" value="0">
                                </td>
                                <td>
                                    <input class="form-control text-center" type="number" name="utilidad_precio1"
                                        id="utilidad_precio1" value="0">
                                </td>
                                <td>
                                    <input class="form-control text-center" type="number" name="utilidad_precio1"
                                        id="utilidad_precio1" value="0">
                                </td>
                                <td>
                                    <input class="form-control text-center" type="number" name="utilidad_precio1"
                                        id="utilidad_precio1" value="0">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    </div>
</div>
@include('pages.departamentos.crear')
@include('pages.categorias.crear')
@include('pages.unidades.crear')
@endsection
@section('scripts')
<script src="{{ asset('js/articulos.js') }}"></script>
@endsection