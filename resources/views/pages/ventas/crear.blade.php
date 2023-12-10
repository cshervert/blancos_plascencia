@extends('layouts.app')
@section('title', 'Nueva Venta')
@section('content')
<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="title">
                        <h4 class="text-blue">Nueva Venta (Salida)</h4>
                    </div>
                </div>
                <div class="col-md-9 col-sm-12 text-right">
                    <button class="btn btn-success mb-3">
                        BUSCAR <i class="icon-copy dw dw-search"></i>
                    </button>
                    <button class="btn btn-warning mb-3">
                        PRECIO <i class="icon-copy dw dw-price-tag"></i>
                    </button>
                    <button class="btn btn-info mb-3">
                        EDITAR <i class="icon-copy dw dw-edit2"></i>
                    </button>
                    <button class="btn btn-danger mb-3">
                        REMOVER <i class="icon-copy dw dw-delete-1"></i>
                    </button>
                    <button class="btn btn-secondary mb-3">
                        DESCUENTO %
                    </button>
                    <button class="btn btn-dark mb-3">
                        IMPORTE $
                    </button>
                    <button class="btn btn-primary mb-3">
                        CHECK <i class="icon-copy dw dw-check"></i>
                    </button>
                </div>
            </div>
            <div class="pd-10 card-box">
                <div class="mb-2">
                    <div class="row no-gutters">
                        <div class="col-md-2 p-2">
                            <br>
                            <img src="{{ asset('uploads/articulos/img-123456789.webp') }}" alt="Foto" width="250px">
                        </div>
                        <div class="col-md-10">
                            <form class="row pd-10">
                                <div class="form-group mb-1 col-md-6">
                                    <label for="clave">Clave Articulo</label>
                                    <div class="input-group mb-0">
                                        <input type="text" class="form-control" id="clave" placeholder="0012457898744">
                                        <div class="input-group-append">
                                            <button class="btn btn-info" type="button">
                                                <i class="icon-copy dw dw-search2"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mb-1 col-md-6">
                                    <label for="clave">Precio Venta</label>
                                    <select class="form-control custom-select2" id="precio" style="width: 100%">
                                        <option value="1">Precio Publico</option>
                                        <option value="2">Precio Vendedor</option>
                                        <option value="3">Precio Cliente</option>
                                        <option value="4">Precio Promocion</option>
                                    </select>
                                </div>
                                <div class="form-group mb-1 col-md-3">
                                    <label for="clave">Importe Unitario</label>
                                    <input type="number" class="form-control text-center" value="259.20">
                                </div>
                                <div class="form-group mb-1 col-md-2">
                                    <label for="clave">Cantidad</label>
                                    <input type="number" class="form-control text-center" value="1">
                                </div>
                                <div class="form-group mb-1 col-md-2">
                                    <label for="clave">Moneda</label>
                                    <select class="form-control custom-select2" id="moneda" style="width: 100%">
                                        @foreach ($monedas as $item)
                                        <option value="{{ $item->id }}">{{ $item->codigo }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group mb-1 col-md-2">
                                    <label for="clave">T. Cambio</label>
                                    <input type="number" class="form-control text-center" value="1">
                                </div>
                                <div class="form-group mb-1 col-md-3">
                                    <label for="clave">Importe Total</label>
                                    <input type="number" class="form-control text-center" value="259.20">
                                </div>
                                <div class="form-group mb-1 col-md-2">
                                    <label for="clave">Caja</label>
                                    <select class="form-control custom-select2" id="caja" style="width: 100%">
                                        @foreach ($cajas as $item)
                                        <option value="{{ $item->id }}">{{ $item->nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="clave">Cliente</label>
                                    <select class="form-control custom-select2" id="cliente" style="width: 100%">
                                        <option value="">Seleccionar</option>
                                        @foreach ($clientes as $item)
                                        <option value="{{ $item->id }}">{{ $item->nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="clave">Empleado</label>
                                    <select class="form-control custom-select2" id="empleado" style="width: 100%">
                                        <option value="">Seleccionar</option>
                                        @foreach ($empleados as $item)
                                        <option value="{{ $item->id }}">{{ $item->nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-2 mt-4">
                                    <button class="btn btn-block btn-success mb-3 mt-1">
                                        AGREGAR <i class="icon-copy dw dw-add"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <table class="table table-sm">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col" class="col-2 text-center">Clave</th>
                            <th scope="col" class="col-1 text-center">Cantidad</th>
                            <th scope="col" class="col-3 text-center">Descripción</th>
                            <th scope="col" class="col-1 text-center">Existencia</th>
                            <th scope="col" class="col-1 text-center">% Desc.</th>
                            <th scope="col" class="col-2 text-center">Precio Unitario</th>
                            <th scope="col" class="col-2 text-center">Importe</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center">000775180006</td>
                            <td class="text-center">1</td>
                            <td class="text-center">ADORNO DE PARED ESTRELLA LYRA</td>
                            <td class="text-center">50 PZA</td>
                            <td class="text-center">0</td>
                            <td class="text-center">178.00</td>
                            <td class="text-center">178.00</td>
                        </tr>
                        <tr>
                            <td class="text-center">000768180006</td>
                            <td class="text-center">1</td>
                            <td class="text-center">ADORNO NAVIDEÑO ESTRELLAS</td>
                            <td class="text-center">10 PZA</td>
                            <td class="text-center">0</td>
                            <td class="text-center">96.39</td>
                            <td class="text-center">96.39</td>
                        </tr>
                        <tr>
                            <td class="text-center">000426220006</td>
                            <td class="text-center">1</td>
                            <td class="text-center">ADORNO NAVIDEÑO SNOW TREE</td>
                            <td class="text-center">12 PZA</td>
                            <td class="text-center">0</td>
                            <td class="text-center">162.00</td>
                            <td class="text-center">162.00</td>
                        </tr>
                        <tr>
                            <td class="text-center">7506396845582</td>
                            <td class="text-center">1</td>
                            <td class="text-center">ALMOHADA ABRAZABLE BUZZ VA</td>
                            <td class="text-center">58 PZA</td>
                            <td class="text-center">0</td>
                            <td class="text-center">150.00</td>
                            <td class="text-center">150.00</td>
                        </tr>
                        <tr>
                            <td class="text-center">7500600683038</td>
                            <td class="text-center">1</td>
                            <td class="text-center">ALMOHADA ABRAZABLE MINNIE CHIQUI</td>
                            <td class="text-center">50 PZA</td>
                            <td class="text-center">0</td>
                            <td class="text-center">354.00</td>
                            <td class="text-center">354.00</td>
                        </tr>
                    </tbody>
                </table>
                <div class="row">
                    <div class="col-md-5"></div>
                    <div class="col-md-7 row">
                        <div class="form-group col-md-4">
                            <label for="clave">Promociones</label>
                            <input type="number" class="form-control text-center" value="0" readonly>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="clave">Descuentos</label>
                            <input type="number" class="form-control text-center" value="0" readonly>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="clave">Retenciones</label>
                            <input type="number" class="form-control text-center" value="0" readonly>
                        </div>
                        <div class="form-group col-md-8">
                            <div class="row">
                                <h4 for="" class="col-sm-4 mt-2 text-success text-right">
                                    Total $
                                </h4>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control text-center" value="5000" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <button class="btn btn-success btn-block">
                                FINALIZAR VENTA <i class="icon-copy dw dw-search"></i>
                            </button>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script src="{{ asset('js/empleados.js') }}"></script>
@endsection