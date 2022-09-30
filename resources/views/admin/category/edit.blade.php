@extends('layouts.admin')
@section('title','Editar Categorías')
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
            Editar Categoria
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-custom">
                <li class="breadcrumb-item"><a href="#">Panel administrador</a></li>
                <li class="breadcrumb-item"><a href="{{route('categories.index')}}">Categorias</a></li>
                <li class="breadcrumb-item active" aria-current="page">Editar de Categorias</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Editar de Categorias</h4>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title">Categorias</h4>
                        </div>
                        {!! Form::model($category,['route' =>['categories.update', $category], 'method' => 'PUT']) !!}
                        <div class="col-md-6">
                            <div class="mb-3 form-floating">
                                <label for="name">Nombre</label>
                                <input type="text" name="name" value="{{$category->name}}" id="name" class="form-control" placeholder="" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3 form-floating">
                                <label for="description">Descripción</label>
                                <input type="text" name="description" value="{{$category->description}}" id="description" class="form-control" placeholder="" >
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Modificar</button>
                        <a href="{{route('categories.index')}}" class="btn btn-outline-danger">Cancelar</a>
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