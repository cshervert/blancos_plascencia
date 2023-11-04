@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
<div class="main-container">
    <div class="pd-ltr-20">
        <div class="height-100-p mb-20">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h4 class="font-16 weight-500 text-capitalize">
                        ¡Bienvenido!<div class="weight-500 font-20 text-default">{{ $usuario['nombre'] }}</div>
                    </h4>
                </div>
                <div class="col-md-6">
                    <h4 class="font-16 weight-500 text-capitalize">
                        <i class="icon-copy dw dw-shopping-bag1"></i> Sucursal
                        <div class="weight-500 font-20 text-default">{{ $usuario['sucursal']->nombre }}</div>
                    </h4>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-3 mb-30">
                <a href="">
                    <div class="card-box height-100-p text-center p-2">
                        <img src="{{ asset('assets/vendors/images/sales.svg') }}" width="120" height="70" alt="ventas">
                        <hr class="mt-0 mb-0">
                        <div class="h4 mb-0 mt-1 text-uppercase">Ventas</div>
                        <div class="weight-600 font-14 mt-0">salidas</div>
                    </div>
                </a>
            </div>
            <div class="col-xl-3 mb-30">
                <a href="">
                    <div class="card-box height-100-p text-center p-2">
                        <img src="{{ asset('assets/vendors/images/return.svg') }}" width="120" height="70" alt="ventas">
                        <hr class="mt-0 mb-0">
                        <div class="h4 mb-0 mt-1 text-uppercase">Devoluciones</div>
                        <div class="weight-600 font-14 mt-0">salidas</div>
                    </div>
                </a>
            </div>
            <div class="col-xl-3 mb-30">
                <a href="">
                    <div class="card-box height-100-p text-center p-2">
                        <img src="{{ asset('assets/vendors/images/transfer_in.svg') }}" width="120" height="70"
                            alt="ventas">
                        <hr class="mt-0 mb-0">
                        <div class="h4 mb-0 mt-1 text-uppercase">Traspasos</div>
                        <div class="weight-600 font-14 mt-0">entradas / salidas</div>
                    </div>
                </a>
            </div>
            <div class="col-xl-3 mb-30">
                <a href="">
                    <div class="card-box height-100-p text-center p-2">
                        <img src="{{ asset('assets/vendors/images/shopping-cart.svg') }}" width="120" height="70"
                            alt="ventas">
                        <hr class="mt-0 mb-0">
                        <div class="h4 mb-0 mt-1 text-uppercase">Compras</div>
                        <div class="weight-600 font-14 mt-0">entradas</div>
                    </div>
                </a>
            </div>
            <div class="col-xl-3 mb-30">
                <a href="">
                    <div class="card-box height-100-p text-center p-2">
                        <img src="{{ asset('assets/vendors/images/price.svg') }}" width="120" height="70" alt="ventas">
                        <hr class="mt-0 mb-0">
                        <div class="h4 mb-0 mt-1 text-uppercase">Cotizacion</div>
                        <div class="weight-600 font-14 mt-0">Documentos</div>
                    </div>
                </a>
            </div>
            <div class="col-xl-3 mb-30">
                <a href="">
                    <div class="card-box height-100-p text-center p-2">
                        <img src="{{ asset('assets/vendors/images/order.svg') }}" width="120" height="70" alt="ventas">
                        <hr class="mt-0 mb-0">
                        <div class="h4 mb-0 mt-1 text-uppercase">Pedidos</div>
                        <div class="weight-600 font-14 mt-0">Documentos</div>
                    </div>
                </a>
            </div>
            <div class="col-xl-3 mb-30">
                <a href="">
                    <div class="card-box height-100-p text-center p-2">
                        <img src="{{ asset('assets/vendors/images/transfer-arrow.svg') }}" width="120" height="70"
                            alt="ventas">
                        <hr class="mt-0 mb-0">
                        <div class="h4 mb-0 mt-1 text-uppercase">Traspasos</div>
                        <div class="weight-600 font-14 mt-0">Solicitudes</div>
                    </div>
                </a>
            </div>
            <div class="col-xl-3 mb-30">
                <a href="">
                    <div class="card-box height-100-p text-center p-2">
                        <img src="{{ asset('assets/vendors/images/cash-register.svg') }}" width="120" height="70"
                            alt="ventas">
                        <hr class="mt-0 mb-0">
                        <div class="h4 mb-0 mt-1 text-uppercase">Corte de caja</div>
                        <div class="weight-600 font-14 mt-0">caja</div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection