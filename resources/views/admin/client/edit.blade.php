@extends('layouts.admin')
@section('title','Editar Cliente')
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
            Edición de Producto
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-custom">
                <li class="breadcrumb-item"><a href="#">Panel administrador</a></li>
                <li class="breadcrumb-item"><a href="{{route('products.index')}}">Productos</a></li>
                <li class="breadcrumb-item active" aria-current="page">Editar Cliente</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Edición de Clientes</h4>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title">Clientes</h4>
                        </div>

                        {!! Form::model($client,['route' =>['clients.update', $client], 'method' => 'PUT']) !!}

                        
                        <div class="col-6 mb-3">
                          <label for="name" class="form-label">Nombre</label>
                          <input type="text" class="form-control" name="name" value="{{$client->name}}" id="name" required>
                          <small class="form-text text-muted">Este campo es obligatorio</small>
                        </div>

                        <div class="col-6  mb-3">
                          <label for="dni" class="form-label">Identificación</label>
                          <input type="number" class="form-control" name="dni" value="{{$client->dni}}" id="dni">
                          <small class="form-text text-muted">Este campo es obligatorio</small>
                        </div>
                        <div class="col-6 mb-3">
                          <label for="nit" class="form-label">Nit</label>
                          <input type="number" class="form-control" name="nit" value="{{$client->nit}}" id="nit"> 
                          <small class="form-text text-muted">Este campo es opcional</small>
                        </div>
                        <div class="col-6 mb-3">
                          <label for="address" class="form-label">Dirección</label>
                          <input type="text" class="form-control" name="address" value="{{$client->address}}" id="address">
                          <small class="form-text text-muted">Este campo es obligatorio</small>
                        </div>
                        <div class="col-6 mb-3">
                          <label for="phone" class="form-label">Teléfono / Celular</label>
                          <input type="number" class="form-control" name="phone" value="{{$client->phone}}" id="phone">
                          <small class="form-text text-muted">Este campo es obligatorio</small>
                        </div>
                        <div class="col-6 mb-3">
                          <label for="email" class="form-label">Email</label>
                          <input type="text" class="form-control" name="email"  value="{{$client->email}}"id="email">
                          <small class="form-text text-muted">Este campo es obligatorio</small>
                        </div>
                        

                    <button type="submit" class="btn btn-primary mr-2">Actualizar</button>
                    <a href="{{route('products.index')}}" class="btn btn-outline-danger">Cancelar</a>
                    {!! Form::close() !!}
                </div>

            </div>
        </div>
    </div>
</div>

@endsection
@section('scripts')
{{!! Html::script('melody/js/dropify.js') !!}

                                @endsection