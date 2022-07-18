@extends('layouts.admin')
@section('title','Gestión de Categorías')
@section('styles')

@endsection
@section('create')

<li class="nav-item d-none d-lg-flex">
    <a class="nav-link" href="{{route('categories.create')}}">
    <span class="btn btn-primary">Crear nuevo</span>
    </a>
</li>
@section('options')
@endsection
@section('preference')
@endsection
@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            Categorias
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-custom">
                <li class="breadcrumb-item"><a href="#">Panel administrador</a></li>
                <li class="breadcrumb-item active" aria-current="page">Categorias</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <!-- <div class="d-flex justify-content-between">
                        <h4 class="card-title">Listar Categorias</h4>
                    <div class="btn-group">
                        <h4 class="card-title">
                            <a href="#">
                                <i class="fas fa-download"> Exportar</i>
                            </a>
                        </h4>
                    </div>
                </div> -->
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title">Categorias</h4>
                            <!-- Example split danger button -->
                            <!-- Example single danger button -->
                            <div class="btn-group">
                                <a dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="{{route('categories.create')}}" class="dropdown-item" type="button">Agregar</a>
                                    <!-- <button class="dropdown-item" type="button">Another action</button>
                                    <button class="dropdown-item" type="button">Something else here</button>
                                     -->
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table id="categories_listing" class="table">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="table-responsive">
                                            <div id="order-listing_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <table id="order-listing" class="table dataTable no-footer" role="grid" aria-describedby="order-listing_info">
                                                            <thead>
                                                                <tr>
                                                                    <th>Id</th>
                                                                    <th>Nombre</th>
                                                                    <th>Descripción</th>
                                                                    <th>Acciones</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach($categories as $category)
                                                                <tr>
                                                                    <th scope="row">{{$category->id}}</th>
                                                                    <td>
                                                                        <a href="{{ route('categories.show', $category) }}">{{$category->name}}</a>

                                                                    </td>
                                                                    <td>{{$category->description}}</td>
                                                                    <td style="width: 20%;">
                                                                        {!! Form::open(['route'=>['categories.destroy', $category],
                                                                        'method'=>'DELETE']) !!}

                                                                        <a class="btn btn-outline-info" href="{{route('categories.edit', $category)}}" title="Editar">
                                                                            <i class="far fa-edit"></i>
                                                                        </a>

                                                                        <button class="btn btn-outline-danger delete-confirm" type="button" onclick="confirmDelete('delete-item_{{$category->id}}')" title="Eliminar">
                                                                            <i class="far fa-trash-alt"></i>
                                                                        </button>

                                                                    </td>
                                                                </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                @endsection
                                @section('scripts')
                                {{!! Html::script('melody/js/data-table.js') !!}
                                @endsection