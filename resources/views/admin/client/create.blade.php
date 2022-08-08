@extends('layouts.admin')
@section('title','Registrar Cliente')
@section('styles')
@endsection
@section('options')
@endsection
@section('preference')
@endsection
@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            Nuevo Contacto
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-custom">
                <li class="breadcrumb-item"><a href="#">Panel administrador</a></li>
                <li class="breadcrumb-item"><a href="{{route('clients.index')}}">Clientes</a></li>
                <li class="breadcrumb-item active" aria-current="page">Registro de Clientes</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Registro de Clientes</h4>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title">Clientes</h4>
                        </div>
                                {!! Form::open(['route' => 'clients.store', 'method' => 'POST']) !!}

                            <div class="form-group col-md-6 mb-3">
                              <label for="name" class="form-label">Nombre *</label>
                              <input type="text" class="form-control" name="name" id="name"  aria-describedby="helpId" required>
                            </div>
                            <div class="form-group col-md-6 mb-3">
                              <label for="email" class="form-label">Correo electrónico *</label>
                              <input type="email" class="form-control" name="email" id="email" placeholder="ejemplo@gmail.com">
                            </div>
                            <div class="form-group col-md-6 mb-3">
                              <label for="dni" class="form-label">Identificación *</label>
                              <input type="number" class="form-control" name="dni" id="dni" aria-describedby="helpId">
                            </div>
                            <div class="form-group col-md-6 mb-3">
                              <label for="nit" class="form-label">NIT</label>
                              <input type="number" class="form-control" name="nit" id="nit" aria-describedby="helpId" >
                              <small class="text-muted">Este campo es opcional</small>
                            </div>
                            <div class="form-group col-md-6 mb-3">
                              <label for="address" class="form-label">Dirección *</label>
                              <input type="text" class="form-control" name="address" id="address" aria-describedby="helpId">
                            </div>
                            <div class="form-group col-md-6 mb-3">
                              <label for="phone" class="form-label">Número de contacto *</label>
                              <input type="number" class="form-control" name="phone" id="phone"  aria-describedby="helpId">
                            </div>


                            <button type="submit" class="btn btn-primary mr-2">Registrar</button>
                            <a href="{{route('clients.index')}}" class="btn btn-outline-danger">Cancelar</a>
                            {!! Form::close() !!}
                    </div>
                    
                </div>
            </div>
        </div>
    </div>

    @endsection
    @section('scripts')
    {{!! Html::script('melody/js/data-table.js') !!}
                                @endsection