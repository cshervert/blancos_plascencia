@extends('layouts.app')
@section('title', 'Empresa')
@section('content')
<div class="main-container">
    <div class="pd-ltr-20">
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="title">
                    <h4>DATOS DE LA EMPRESA</h4>
                </div>
                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Inicio</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Empresa</li>
                    </ol>
                </nav>
            </div>
            <!-- <div class="col-md-6 col-sm-12 text-right">
                <button class="btn btn-success" type="button">
                    AGREGAR <i class="icon-copy dw dw-add"></i>
                </button>
            </div> -->
        </div>
        <!-- <div class="card-box pd-20 height-100-p mb-30">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h4 class="font-10 weight-500 mb-10 text-capitalize">
                        <div class="weight-600 font-10 text-default">DATOS DE LA EMPRESA</div>
                    </h4>

                </div>
            </div>
        </div> -->
        <div class="card text-center">
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
                <div class="card-body tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                <form id="formEmpresa">
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Nombre</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" type="hidden" name="id" placeholder="" value="{{ $empresa->id ? $empresa->id : ''}}">
                            <input class="form-control" type="text" name="nombre" placeholder="" value="{{ $empresa->nombre ? $empresa->nombre : ''}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">R.F.C</label>
                        <div class="col-sm-12 col-md-4">
                            <input class="form-control" type="text" name="rfc" placeholder="" value="{{ $empresa->rfc ? $empresa->rfc : ''}}">
                        </div>
                        <label class="col-sm-12 col-md-2 col-form-label">CURP</label>
                        <div class="col-sm-12 col-md-4">
                            <input class="form-control" type="text" name="curp" placeholder="" value="{{ $empresa->curp ? $empresa->curp : ''}}" >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Domicilio</label>
                        <div class="col-sm-12 col-md-5">
                        <input class="form-control" type="text" placeholder="" name="domicilio" value="{{ $empresa->domicilio ? $empresa->domicilio : ''}}">
                        </div>
                        <label class="col-sm-12 col-md-1 col-form-label">No. Int.</label>
                        <div class="col-sm-12 col-md-1">
                            <input class="form-control" type="text" placeholder="" name="no_int" value="{{ $empresa->numero_interior ? $empresa->numero_interior : ''}}" >
                        </div>
                        <label class="col-sm-12 col-md-1 col-form-label">No. Ext.</label>
                        <div class="col-sm-12 col-md-1">
                            <input class="form-control" type="text" placeholder="" name="no_ext" value="{{ $empresa->numero_exterior ? $empresa->numero_exterior : ''}}" >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Colonia</label>
                        <div class="col-sm-12 col-md-6">
                        <input class="form-control" type="text" placeholder="" name="colonia" value="{{ $empresa->colonia ? $empresa->colonia : ''}}">
                        </div>
                        <label class="col-sm-12 col-md-2 col-form-label">C.P.</label>
                        <div class="col-sm-12 col-md-2">
                            <input class="form-control" type="text" placeholder="" name="cp" value="{{ $empresa->cp ? $empresa->cp : ''}}" >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Ciudad</label>
                        <div class="col-sm-12 col-md-5">
                            <input class="form-control" type="text" placeholder="" name="ciudad" value="{{ $empresa->ciudad ? $empresa->ciudad : ''}}">
                        </div>
                        <label class="col-sm-12 col-md-2 col-form-label">Estado</label>
                        <div class="col-sm-12 col-md-3">
                            <input class="form-control" type="text" placeholder="" name="estado" value="{{ $empresa->estado ? $empresa->estado : ''}}" >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Telefo</label>
                        <div class="col-sm-12 col-md-4">
                            <input class="form-control" type="text" placeholder="" name="telefono" value="{{ $empresa->telefono ? $empresa->telefono : ''}}">
                        </div>
                        <label class="col-sm-12 col-md-2 col-form-label">Celular</label>
                        <div class="col-sm-12 col-md-4">
                            <input class="form-control" type="text" placeholder="" name="celular" value="{{ $empresa->celular ? $empresa->celular : ''}}" >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Email</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" type="text" placeholder="" name="email" value="{{ $empresa->email ? $empresa->email : ''}}">
                        </div>
                    </div>
                    <div class="form-group row text-right px-4 float-right">
                            <button id="btnEmpresa" class="btn btn-success" type="button">
                                Actualizar <i class="icon-copy dw dw-add"></i>
                            </button>
                        </div>
                </form>
                </div>
                <div class="container card-body tab-pane" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">                    
                    <div class="form-group row text-right px-4 float-right">
                        <button class="btn btn-success" data-toggle="modal" data-target="#cuenta-modal" type="button">
                            AGREGAR <i class="icon-copy dw dw-add"></i>
                        </button>
                    </div>
                    <div class="modal" id="cuenta-modal" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="login-box bg-white">
                                    <div class="login-title">
                                        <h2 class="text-center text-primary">Agregar Cuenta Bancaria</h2>
                                    </div>
                                    <form>
                                        <input class="form-control" type="hidden" name="id" placeholder="" value="{{ $empresa->id ? $empresa->id : ''}}">
                                        <div class="input-group custom">
                                            <input type="text" class="form-control form-control-lg" placeholder="Cuenta">
                                        </div>
                                        <div class="input-group custom">
                                            <input type="password" class="form-control form-control-lg" placeholder="Sucursal">
                                        </div>
                                        <div class="input-group custom">
                                            <input type="text" class="form-control form-control-lg" placeholder="Clave">
                                        </div>
                                        <div class="input-group custom">
                                            <input type="password" class="form-control form-control-lg" placeholder="Banco">
                                        </div>
                                        <div class="input-group custom">
                                            <input type="text" class="form-control form-control-lg" placeholder="Cuenta contable">
                                        </div>
                                        <div class="row pb-30">
                                            <div class="col-12">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="customCheck1">
                                                    <label class="custom-control-label" for="customCheck1">Mostrar</label>
                                                </div>
                                            </div>
                                        </div>                                                                            
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary text-right" data-dismiss="modal">Close</button> 
                                            <button type="button" class="btn btn-success">Agregar</button>
										</div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-20">
                        <table class="table hover nowrap">
                            <thead>
                                <tr>
                                    <th class="">ID</th>
                                    <th class="col-1">Cuenta</th>
                                    <th class="col-3">Sucursal</th>
                                    <th class="col-1">Clave</th>
                                    <th class="col-1">Banco</th>
                                    <th class="col-1">Mostrar</th>
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
                                    <td>
                                        <input type="checkbox" class="switch-btn" data-color="#28a745" @if ($item->mostrar)
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
    </div>
</div>
@endsection
@section('scripts')
<script src="{{ asset('js/empresa.js') }}"></script>
@endsection