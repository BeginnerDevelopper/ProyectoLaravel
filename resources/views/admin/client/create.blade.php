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
                <div class="card bg-info text-white col-md-12 mb-3 " style="max-width: 18rem;">
                  <div class="card-header">
                    <h5>Los campos marcados con (*) son obligatorios</h5>
                  </div>
                </div>
            </div>
                       
            @if ($errors->any())
            <div class="alert alert-danger">
              <ul>
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
            @endif
            {!! Form::open(['route' => 'clients.store', 'method' => 'POST']) !!}

            @csrf
            <div class="form-group col-md-6 mb-3 ">
              <label for="name" class="form-label">Nombre *</label>
              <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ old('name') }}" aria-describedby="helpId">
            </div>
            <div class="form-group col-md-6 mb-3">
              <label for="email" class="form-label">Correo electrónico *</label>
              <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{ old('email') }}" placeholder="ejemplo@gmail.com">

            </div>
            <div class="form-group col-md-4 mb-3">
              <label for="dni" class="form-label">Identificación *</label>
              <input type="number" class="form-control @error('dni') is-invalid @enderror" name="dni" id="dni" value="{{ old('dni') }}" aria-describedby="helpId">
            </div>
            <div class="form-group col-md-4 mb-3">
              <label for="nit" class="form-label">NIT</label>
              <input type="number" class="form-control @error('nit') is-invalid @enderror" name="nit" id="nit" value="{{ old('nit') }}" aria-describedby="helpId">
            </div>
            <div class="form-group col-md-6 mb-3">
              <label for="address" class="form-label">Dirección</label>
              <input type="text" class="form-control @error('address') is-invalid @enderror" name="address" id="address" value="{{ old('address') }}" aria-describedby="helpId">
              @error('address')
              <small class="text-muted">{{$message}}</small>
              @enderror
            </div>
            <div class="form-group col-md-4 mb-3">
              <label for="phone" class="form-label">Número de contacto *</label>
              <input type="number" class="form-control @error('phone') is-invalid @enderror" name="phone" id="phone" value="{{ old('phone') }}" aria-describedby="helpId">
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
  {!! Html::script('melody/js/data-table.js') !!}

  @endsection