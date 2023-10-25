@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
<div class="main-container">
    <div class="pd-ltr-20">
        <div class="card-box pd-20 height-100-p mb-30">
            <div class="row align-items-center">
                <div class="col-md-3">
                    <img src="{{ asset('assets/vendors/images/banner-img.png') }}" alt="">
                </div>
                <div class="col-md-4">
                    <h4 class="font-20 weight-500 mb-10 text-capitalize">
                        Bienvenido !!!<div class="weight-600 font-30 text-default">Juan Carlos</div>
                    </h4>
                    <p class="font-18 max-width-600 text text-uppercase">
                        Sucursal Tesistan 1
                    </p>
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
                        <img src="{{ asset('assets/vendors/images/transfer_in.svg') }}" width="120" height="70" alt="ventas">
                        <hr class="mt-0 mb-0">
                        <div class="h4 mb-0 mt-1 text-uppercase">Traspasos</div>
                        <div class="weight-600 font-14 mt-0">entradas / salidas</div>
                    </div>
                </a>
            </div>
            <div class="col-xl-3 mb-30">
                <a href="">
                    <div class="card-box height-100-p text-center p-2">
                        <img src="{{ asset('assets/vendors/images/shopping-cart.svg') }}" width="120" height="70" alt="ventas">
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
                        <img src="{{ asset('assets/vendors/images/transfer-arrow.svg') }}" width="120" height="70" alt="ventas">
                        <hr class="mt-0 mb-0">
                        <div class="h4 mb-0 mt-1 text-uppercase">Traspasos</div>
                        <div class="weight-600 font-14 mt-0">Solicitudes</div>
                    </div>
                </a>
            </div>
            <div class="col-xl-3 mb-30">
                <a href="">
                    <div class="card-box height-100-p text-center p-2">
                        <img src="{{ asset('assets/vendors/images/cash-register.svg') }}" width="120" height="70" alt="ventas">
                        <hr class="mt-0 mb-0">
                        <div class="h4 mb-0 mt-1 text-uppercase">Corte de caja</div>
                        <div class="weight-600 font-14 mt-0">caja</div>
                    </div>
                </a>
            </div>
        </div>
        <div class="card-box mb-30">
            <h2 class="h4 pd-20">Productos más vendidos</h2>
            <table class="data-table table nowrap">
                <thead>
                    <tr>
                        <th class="table-plus datatable-nosort">Product</th>
                        <th>Name</th>
                        <th>Color</th>
                        <th>Size</th>
                        <th>Price</th>
                        <th>Oty</th>
                        <th class="datatable-nosort">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="table-plus">
                            <img src="{{ asset('assets/vendors/images/product-1.jpg') }}" width="70" height="70" alt="">
                        </td>
                        <td>
                            <h5 class="font-16">Shirt</h5>
                            by John Doe
                        </td>
                        <td>Black</td>
                        <td>M</td>
                        <td>$1000</td>
                        <td>1</td>
                        <td>
                            <div class="dropdown">
                                <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#"
                                    role="button" data-toggle="dropdown">
                                    <i class="dw dw-more"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                    <a class="dropdown-item" href="#"><i class="dw dw-eye"></i> View</a>
                                    <a class="dropdown-item" href="#"><i class="dw dw-edit2"></i> Edit</a>
                                    <a class="dropdown-item" href="#"><i class="dw dw-delete-3"></i> Delete</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="table-plus">
                            <img src="{{ asset('assets/vendors/images/product-2.jpg') }}" width="70" height="70" alt="">
                        </td>
                        <td>
                            <h5 class="font-16">Boots</h5>
                            by Lea R. Frith
                        </td>
                        <td>brown</td>
                        <td>9UK</td>
                        <td>$900</td>
                        <td>1</td>
                        <td>
                            <div class="dropdown">
                                <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#"
                                    role="button" data-toggle="dropdown">
                                    <i class="dw dw-more"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                    <a class="dropdown-item" href="#"><i class="dw dw-eye"></i> View</a>
                                    <a class="dropdown-item" href="#"><i class="dw dw-edit2"></i> Edit</a>
                                    <a class="dropdown-item" href="#"><i class="dw dw-delete-3"></i> Delete</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="table-plus">
                            <img src="{{ asset('assets/vendors/images/product-3.jpg') }}" width="70" height="70" alt="">
                        </td>
                        <td>
                            <h5 class="font-16">Hat</h5>
                            by Erik L. Richards
                        </td>
                        <td>Orange</td>
                        <td>M</td>
                        <td>$100</td>
                        <td>4</td>
                        <td>
                            <div class="dropdown">
                                <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#"
                                    role="button" data-toggle="dropdown">
                                    <i class="dw dw-more"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                    <a class="dropdown-item" href="#"><i class="dw dw-eye"></i> View</a>
                                    <a class="dropdown-item" href="#"><i class="dw dw-edit2"></i> Edit</a>
                                    <a class="dropdown-item" href="#"><i class="dw dw-delete-3"></i> Delete</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="table-plus">
                            <img src="{{ asset('assets/vendors/images/product-4.jpg') }}" width="70" height="70" alt="">
                        </td>
                        <td>
                            <h5 class="font-16">Long Dress</h5>
                            by Renee I. Hansen
                        </td>
                        <td>Gray</td>
                        <td>L</td>
                        <td>$1000</td>
                        <td>1</td>
                        <td>
                            <div class="dropdown">
                                <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#"
                                    role="button" data-toggle="dropdown">
                                    <i class="dw dw-more"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                    <a class="dropdown-item" href="#"><i class="dw dw-eye"></i> View</a>
                                    <a class="dropdown-item" href="#"><i class="dw dw-edit2"></i> Edit</a>
                                    <a class="dropdown-item" href="#"><i class="dw dw-delete-3"></i> Delete</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="table-plus">
                            <img src="{{ asset('assets/vendors/images/product-5.jpg') }}" width="70" height="70" alt="">
                        </td>
                        <td>
                            <h5 class="font-16">Blazer</h5>
                            by Vicki M. Coleman
                        </td>
                        <td>Blue</td>
                        <td>M</td>
                        <td>$1000</td>
                        <td>1</td>
                        <td>
                            <div class="dropdown">
                                <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#"
                                    role="button" data-toggle="dropdown">
                                    <i class="dw dw-more"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                    <a class="dropdown-item" href="#"><i class="dw dw-eye"></i> View</a>
                                    <a class="dropdown-item" href="#"><i class="dw dw-edit2"></i> Edit</a>
                                    <a class="dropdown-item" href="#"><i class="dw dw-delete-3"></i> Delete</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection