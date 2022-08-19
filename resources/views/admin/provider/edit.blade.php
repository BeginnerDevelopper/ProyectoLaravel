@extends('layouts.admin')
@section('title','Editar Proveedor')
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
            Edición de Proveedor
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-custom">
                <li class="breadcrumb-item"><a href="#">Panel administrador</a></li>
                <li class="breadcrumb-item"><a href="{{route('providers.index')}}">Proveedores</a></li>
                <li class="breadcrumb-item active" aria-current="page">Editar Proveedor</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Registro de Proveedores</h4>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title">Proveedores</h4>
                        </div>

                                {!! Form::model($provider,['route' =>['providers.update', $provider], 'method' => 'PUT']) !!}

                            <div class="form-group col-md-6 mb-3">
                              <label for="name" class="form-label">Nombre *</label>
                              <input type="text" class="form-control" name="name" id="name" value="{{($provider->name)}}"  aria-describedby="helpId" required>
                            </div>
                            <div class="form-group col-md-6 mb-3">
                              <label for="email" class="form-label">Correo electrónico *</label>
                              <input type="email" class="form-control" name="email" id="email" value="{{($provider->email)}}" aria-describedby="emailHelpId" placeholder="ejemplo@gmail.com" required>
                            </div>
                            <div class="form-group col-md-6 mb-3">
                              <label for="nit_number" class="form-label">NIT *</label>
                              <input type="number" class="form-control" name="nit_number" id="nit_number" value="{{($provider->nit_number)}}" aria-describedby="helpId" required>
                            </div>
                            <div class="form-group col-md-6 mb-3">
                              <label for="address" class="form-label">Dirección *</label>
                              <input type="text" class="form-control" name="address" id="address" value="{{($provider->address)}}" aria-describedby="helpId" required>
                            </div>
                            <div class="form-group col-md-6 mb-3">
                              <label for="phone" class="form-label">Número de contacto *</label>
                              <input type="number" class="form-control" name="phone" id="phone"  value="{{($provider->phone)}}" aria-describedby="helpId" required>
                            </div>


                            <button type="submit" class="btn btn-primary mr-2">Actualizar</button>
                            <a href="{{route('providers.index')}}" class="btn btn-outline-danger">Cancelar</a>
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