@extends('layouts.admin')
@section('title','Editar Usuarios')
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
            Editar Usuario
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-custom">
                <li class="breadcrumb-item"><a href="#">Panel administrador</a></li>
                <li class="breadcrumb-item"><a href="{{route('users.index')}}">Usuarios</a></li>
                <li class="breadcrumb-item active" aria-current="page">Editar de Usuarios</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Editar Usuarios</h4>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                           
                        </div>
                        {!! Form::model($user,['route' =>['users.update', $user], 'method' => 'PUT']) !!}
                     
                        <div class="form-group mb-3 cl-md-6">
                            <label for="name" class="form-label">Nombre</label>
                            <input type="text" name="name" id="name" value="{{$user->name}}"class="form-control" aria-describedby="helpId">
                        </div>
                        <div class="form-group mb-3 cl-md-6">
                            <label for="email" class="form-label">Correo electrónico</label>
                            <input type="text" name="email" id="email" value="{{$user->email}}" class="form-control" placeholder="" aria-describedby="helpId">
                        </div>
                        <div class="form-group mb-3 cl-md-6">
                            <label for="password" class="form-label">Contraseña</label>
                            <input type="password" name="password" id="password" value="{{$user->password}}" class="form-control" placeholder="" aria-describedby="helpId">
                            <small class="text-muted">Rellena solo si desea cambiar la clave</small>
                        </div>

                            @include('admin.user._form')

                        <button type="submit" class="btn btn-primary mr-2">Modificar</button>
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