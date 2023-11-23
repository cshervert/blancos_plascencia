@extends('layouts.app')
@section('title', 'Empresa')
@section('content')
<div class="main-container">
    <div class="pd-ltr-20">
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="title">
                    <h4 class="text-blue">Datos de Empresa</h4>
                </div>
                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Inicio</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Empresa</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="card ">
            <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs">
                <li class="nav-item">
                    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Datos Generales</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Datos Bancarios</a>
                </li>
                </ul>
            </div>
            <div class="tab-content" id="pills-tabContent">
                <div class="card-body tab-pane fade show active pd-30" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                <form id="formEmpresa">
                    <div class="row">
                        <div class="form-group col-md-12 mb-0">
                            <label class="form-label">Nombre</label>
                            <label class="form-control-label has-danger " id="msg-nombre"></label>
                            <input class="form-control" type="hidden" name="id" placeholder="" value="{{ $empresa->id ? $empresa->id : ''}}">
                            <input class="form-control" type="text" onkeyup="validateFormEmpresa()" id="nombre" name="nombre" placeholder="" value="{{ $empresa->nombre ? $empresa->nombre : ''}}">

                        </div>
                        <div class="form-group col-md-6 mb-0">
                            <label class="form-label">R.F.C</label>
                            <label class="form-control-label has-danger " id="msg-rfc"></label>
                            <input class="form-control" maxlength="13" type="text" onkeyup="validateFormEmpresa()" id="rfc" name="rfc" placeholder="" value="{{ $empresa->rfc ? $empresa->rfc : ''}}">
                        </div>
                        <div class="form-group col-md-6 mb-0">
                            <label class="form-label">CURP</label>
                            <input class="form-control" maxlength="18" type="text" onkeyup="validateFormEmpresa()" id="curp" name="curp" placeholder="" value="{{ $empresa->curp ? $empresa->curp : ''}}" >
                        </div>
                        <div class="form-group col-md-6 mb-0">
                            <label class="form-label">Domicilio</label>
                            <label class="form-control-label has-danger ml-2" id="msg-domicilio"></label>
                            <input class="form-control" type="text" onkeyup="validateFormEmpresa()" id="domicilio" placeholder="" name="domicilio" value="{{ $empresa->domicilio ? $empresa->domicilio : ''}}">
                        </div>
                        <div class="form-group col-md-3 mb-0">
                            <label class="form-label">No. Ext.</label>
                            <label class="form-control-label has-danger ml-2" id="msg-noext"></label>
                            <input class="form-control" type="text" onkeyup="validateFormEmpresa()" id="no_ext" placeholder="" name="no_ext" value="{{ $empresa->numero_exterior ? $empresa->numero_exterior : ''}}" >
                        </div>
                        <div class="form-group col-md-3 mb-0">
                            <label class="form-label">No. Int.</label>
                            <input class="form-control" type="text" onkeyup="validateFormEmpresa()" id="no_int" placeholder="" name="no_int" value="{{ $empresa->numero_interior ? $empresa->numero_interior : ''}}" >
                        </div>
                        <div class="form-group col-md-8 mb-0">
                            <label class="form-label">Colonia</label>
                            <input class="form-control" type="text" onkeyup="validateFormEmpresa()" id="colonia" placeholder="" name="colonia" value="{{ $empresa->colonia ? $empresa->colonia : ''}}">
                        </div>
                        <div class="form-group col-md-4 mb-0">
                            <label class="form-label">C.P.</label>
                            <input class="form-control" type="text" onkeyup="validateFormEmpresa()" id="cp" placeholder="" name="cp" value="{{ $empresa->cp ? $empresa->cp : ''}}" >
                        </div>
                        <div class="form-group col-md-6 mb-0">
                            <label class="form-label">Ciudad</label>
                            <input class="form-control" type="text" onkeyup="validateFormEmpresa()" id="ciudad" placeholder="" name="ciudad" value="{{ $empresa->ciudad ? $empresa->ciudad : ''}}">
                        </div>
                        <div class="form-group col-md-6 mb-0">
                            <label class="form-label">Estado</label>
                            <input class="form-control" type="text" onkeyup="validateFormEmpresa()" id="estado" placeholder="" name="estado" value="{{ $empresa->estado ? $empresa->estado : ''}}" >
                        </div>
                        <div class="form-group col-md-6 mb-0">
                            <label class="form-label">Telefo</label>
                            <label class="form-control-label has-danger ml-2" id="msg-telefono"></label>
                            <input class="form-control" type="text" onkeyup="validateFormEmpresa()" id="telefono" placeholder="" name="telefono" value="{{ $empresa->telefono ? $empresa->telefono : ''}}">
                        </div>
                        <div class="form-group col-md-6 mb-0">
                            <label class="form-label">Celular</label>
                            <label class="form-control-label has-danger ml-2" id="msg-celular"></label>
                            <input class="form-control" type="text" onkeyup="validateFormEmpresa()" id="celular" placeholder="" name="celular" value="{{ $empresa->celular ? $empresa->celular : ''}}" >
                        </div>
                        <div class="form-group col-md-12 mb-0">
                            <label class="form-label">Email</label>
                            <label class="form-control-label has-danger ml-2" id="msg-email"></label>                    
                            <input class="form-control" type="text" onkeyup="validateFormEmpresa()" id="email" placeholder="" name="email" value="{{ $empresa->email ? $empresa->email : ''}}">                        
                        </div>
                        <div class="form-group col-md-12 mb-0 text-right px-4 mt-3 float-right">
                            <button id="btnEmpresa" class="btn btn-success" type="button">
                                Actualizar <i class="icon-copy dw dw-add"></i>
                            </button>
                        </div>
                    </div>
                </form>
                </div>
                <div class="card-body tab-pane pd-30" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">                    
                    <div class="form-group row text-right px-4 float-right">
                        <button class="btn btn-success" data-toggle="modal" data-target="#cuenta-modal" type="button">
                            AGREGAR <i class="icon-copy dw dw-add"></i>
                        </button>
                    </div>
                    <div class="modal fade" id="cuenta-modal" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered ">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title text-blue" id="my-crear-unidad-modal">Crear Cuenta Bancaria</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                        <i class="icon-copy fa fa-close" aria-hidden="true"></i>
                                    </button>
                                </div>
                                <form id="formCuenta" class="">
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="form-group col-md-12 mb-0">
                                                <input class="form-control" type="hidden" name="id" id="id" placeholder="" value="">
                                                <input class="form-control" type="hidden" name="id_empresa" placeholder="" value="{{ $empresa->id ? $empresa->id : ''}}">
                                                <input type="text" name="cuenta" id="cuenta" class="form-control " placeholder="Cuenta" onkeyup="validateFormCuenta()">
                                                <label class="form-control-feedback has-danger " id="msg-cuenta"></label>                                                
                                            </div>
                                            <div class="form-group col-md-12 mb-4">
                                                <input type="text" name="sucursal" id="sucursal" class="form-control form-control-lg" placeholder="Sucursal">
                                            </div>
                                            <div class="form-group col-md-12 mb-1">
                                                <input type="text" name="clave" id="clave" class="form-control " placeholder="Clave" onkeyup="validateFormCuenta()">
                                                <label class="form-control-feedback has-danger" id="msg-clave"></label>
                                            </div>
                                            <div class="form-group col-md-12 mb-1">
                                                <input type="text" name="banco" id="banco" class="form-control " placeholder="Banco" onkeyup="validateFormCuenta()">
                                                <label class="form-control-feedback has-danger" id="msg-banco"></label>
                                            </div>
                                            <div class="form-group col-md-12 mb-2">
                                                <input type="text" name="contable" id="contable" class="form-control form-control-lg" placeholder="Cuenta contable">
                                            </div>
                                            <div class="col-md-12 mb-2 mt-2 text-center">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="mostrar" name="mostrar">
                                                    <label class="custom-control-label" for="mostrar">Mostrar</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">SALIR</button> 
                                        <button type="button" id="btnCuenta" class="btn btn-success">
                                            GUARDAR <i class="icon-copy dw dw-checked ml-1"></i>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="mb-20">
                        <table class="table hover nowrap">
                            <thead>
                                <tr>
                                    <th class="col-1">ID</th>
                                    <th class="col-1">Cuenta</th>
                                    <th class="col-3">Sucursal</th>
                                    <th class="col-2">Clave</th>
                                    <th class="col-2">Banco</th>
                                    <th class="col-1  text-center">Mostrar</th>
                                    <th class="col-2 text-center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cuentas as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->cuenta }}</td>
                                    <td>{{ $item->sucursal }}</td>
                                    <td>{{ $item->clave }}</td>
                                    <td>{{ $item->banco }}</td>
                                    <td class="text-center">
                                        <!-- <input type="checkbox" class="switch-btn" data-color="#28a745" @if ($item->mostrar)
                                        checked @endif> -->
                                        <label class="cl-switch cl-switch-large cl-switch-green">
                                            <input type="checkbox" id="{{ $item->id }}" onchange="changeCuenta(this)" @if($item->mostrar) checked @endif>
                                            <span class="switcher"></span>
                                        </label>
                                    </td>
                                    <td class="text-center">
                                        <button class="btn btn-info btn-circle btn-xl" type="button" id="{{$item}}" onclick="openModal(this);">
                                            <i class="icon-copy dw dw-edit-1"></i>
                                        </button>
                                        <button class="btn btn-danger btn-circle btn-xl" type="button" id="{{$item->id}}" onclick="deleteCuenta(this);">
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
    </div>
</div>
@endsection
@section('scripts')
<script src="{{ asset('js/empresa.js') }}"></script>
@endsection