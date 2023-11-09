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
                            <li class="breadcrumb-item" aria-current="page"><a
                                    href="{{ route('usuarios') }}">Usuarios</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Crear</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-md-6 col-sm-12 text-right">
                    <a class="btn btn-secondary" href="{{ route('usuarios') }}">
                        REGRESAR <i class="icon-copy dw dw-return-1"></i>
                    </a>
                </div>
            </div>
            <div class="card-box">
                <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" id="pills-general-tab" data-toggle="pill" href="#pills-general" role="tab" aria-controls="pills-general" aria-selected="true">
                                Datos Generales
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-accesso-tab" data-toggle="pill" href="#pills-accesso" role="tab" aria-controls="pills-accesso" aria-selected="false">
                                Datos de Accesso
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="tab-content" id="pills-tabContent">
                    <div class="card-body tab-pane fade show active" id="pills-general" role="tabpanel"
                        aria-labelledby="pills-general-tab">
                        <form id="FormCreateUsuario">
                            <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label">Nombre</label>
                                <div class="col-sm-12 col-md-10">
                                    <input class="form-control" type="text" placeholder="Johnny Brown">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label">Search</label>
                                <div class="col-sm-12 col-md-10">
                                    <input class="form-control" placeholder="Search Here" type="search">
                                </div>
                            </div>
                            @csrf
                            <div class="col-12 text-right">
                                <button type="submit" class="btn btn-success">
                                    CREAR usuario <i class="icon-copy dw dw-checked"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="container card-body tab-pane" id="pills-accesso" role="tabpanel"
                        aria-labelledby="pills-accesso-tab">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script src="{{ asset('js/auth/usuario.js') }}"></script>
@endsection