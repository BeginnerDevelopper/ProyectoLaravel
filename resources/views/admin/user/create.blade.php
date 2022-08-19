@extends('layouts.admin')
@section('title','Registro de Usuario')
@section('styles')

@endsection
@section('create')
@section('options')
@endsection
@section('preference')
@endsection
@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            Nuevo Usuario
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-custom">
                <li class="breadcrumb-item"><a href="#">Panel administrador</a></li>
                <li class="breadcrumb-item"><a href="{{route('users.index')}}">Usuarios</a></li>
                <li class="breadcrumb-item active" aria-current="page">Registro de Usuarios</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Formulario obligatorio *</h4>
                    </div>
                    <div class="card-body">
                        {!! Form::open(['route' => 'users.store', 'method' => 'POST']) !!}
                        <div class="form-group col-md-6">
                            <div class="mb-3 form-floating">
                                <label for="name">Nombre</label>
                                <input type="text" name="name" id="name" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <div class="mb-3 form-floating">
                                <label for="email">Correo Electrónico</label>
                                <input type="text" name="email" id="email" class="form-control" placeholder="example@gmail.com">
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <div class="mb-3 form-floating">
                                <label for="password">Contraseña</label>
                                <input type="password" name="password" id="password" class="form-control">
                            </div>
                        </div>
                        @include('admin.user._form')
                        <button type="submit" class="btn btn-primary mr-2">Registrar</button>
                        <a href="{{route('users.index')}}" class="btn btn-outline-danger">Cancelar</a>
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