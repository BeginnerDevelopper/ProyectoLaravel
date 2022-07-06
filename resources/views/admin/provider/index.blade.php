@extends('layouts.admin')
@section('title','Módulo de Proveedores')
@section('styles')

@endsection
@section('create')

<li class="nav-item d-none d-lg-flex">
    <a class="nav-link" href="{{route('providers.create')}}">
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
            Proveedores
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-custom">
                <li class="breadcrumb-item"><a href="#">Panel administrador</a></li>
                <li class="breadcrumb-item"><a href="{{route('providers.index')}}">Proveedores</a></li>
                <li class="breadcrumb-item active" aria-current="page">Registro de proveedores</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title">Providers</h4>
                            <!-- Example split danger button -->
                            <!-- Example single danger button -->
                            <div class="btn-group">
                                <a dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="{{route('providers.create')}}" class="dropdown-item" type="button">Agregar</a>
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
                                                                    <th>Correo Electronico</th> 
                                                                    <th>Teléfono/Celular</th> 
                                                                    <th>Acciones</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach($providers as $provider)
                                                                <tr>
                                                                    <th scope="row">{{$provider->id}}</th>
                                                                    <td>
                                                                        <a href="{{ route('providers.show', $provider) }}">{{$provider->name}}</a>
                                                                    </td>
                                                                    <td>{{$provider->email}}</td>
                                                                    <td>{{$provider->phone}}</td>
                                                                    <td style="width: 20%;">
                                                                        {!! Form::open(['route'=>['providers.destroy', $provider],
                                                                        'method'=>'DELETE']) !!}

                                                                        <a class="btn btn-outline-info" href="{{route('providers.edit', $provider)}}" title="Editar">
                                                                            <i class="far fa-edit"></i>
                                                                        </a>

                                                                        <button class="btn btn-outline-danger delete-confirm" type="submit" title="Eliminar">
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