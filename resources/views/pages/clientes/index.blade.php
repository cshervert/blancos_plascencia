@extends('layouts.app')
@section('title', 'Empresa')
@section('content')
<div class="main-container">
    <div class="pd-ltr-20">
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="title">
                    <h4>CLIENTES</h4>
                </div>
                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Inicio</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Clientes</li>
                    </ol>
                </nav>
            </div>
            <!-- <div class="col-md-6 col-sm-12 text-right">
                <button class="btn btn-success" type="button">
                    AGREGAR <i class="icon-copy dw dw-add"></i>
                </button>
            </div> -->
        </div>

        <div class="card text-center">

        </div>
    </div>
</div>
@endsection
@section('scripts')
<script src="{{ asset('js/clientes.js') }}"></script>
@endsection