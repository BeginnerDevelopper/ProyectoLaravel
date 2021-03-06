@extends('layouts.admin')
@section('title','Registro de Rol')
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
            Nuevo Role
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-custom">
                <li class="breadcrumb-item"><a href="#">Panel administrador</a></li>
                <li class="breadcrumb-item"><a href="{{route('roles.index')}}">Roles</a></li>
                <li class="breadcrumb-item active" aria-current="page">Registro de Roles</li>
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
                        {!! Form::open(['route' => 'roles.store', 'method' => 'POST']) !!}

                        <div class="form-group mb-3 cl-md-6">
                            <label for="name" class="form-label">Nombre</label>
                            <input type="text" name="name" id="name" class="form-control" aria-describedby="helpId">
                        </div>
                        <div class="form-group mb-3 cl-md-6">
                            <label for="slug" class="form-label">Cargo</label>
                            <input type="text" name="slug" id="slug"  class="form-control" placeholder="" aria-describedby="helpId">
                        </div>
                        <div class="form-group mb-3 cl-md-6">
                            <label for="description" class="form-label">Descripción</label>
                            <input type="text" name="description" id="description" class="form-control" placeholder="" aria-describedby="helpId">
                        </div>

                        <h3>Permisos especiales</h3>
                        <div class="mb-3">
                            <label for="">{!!Form::radio('special', 'all-access')!!}Acceso Total</label>
                            <label for=""> {!! Form::radio('special', 'no-access')!!} Ningún Acesso</label>
                        </div>
                    





                        @include('admin.role._form')
                        <button type="submit" class="btn btn-primary mr-2">Registrar</button>
                        <a href="{{route('roles.index')}}" class="btn btn-outline-danger">Cancelar</a>
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