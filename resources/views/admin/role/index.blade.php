@extends('layouts.admin')
@section('title','Gestión de Roles del sistema')
@section('styles')

@endsection
@section('create')

<li class="nav-item d-none d-lg-flex">
    <a class="nav-link" href="{{route('roles.create')}}">
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
            Roles del sistema
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-custom">
                <li class="breadcrumb-item"><a href="#">Panel administrador</a></li>
                <li class="breadcrumb-item active" aria-current="page">Roles del sistema</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <!-- <div class="d-flex justify-content-between">
                        <h4 class="card-title">Listar Roles del sistema</h4>
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
                            <h4 class="card-title">Roles del sistema</h4>
                            <!-- Example split danger button -->
                            <!-- Example single danger button -->
                            <div class="btn-group">
                                <a dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="{{route('roles.create')}}" class="dropdown-item" type="button">Agregar</a>
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
                                                                @foreach($roles as $role)
                                                                <tr>
                                                                    <th scope="row">{{$role->id}}</th>
                                                                    <td>
                                                                        <a href="{{ route('roles.show', $role) }}">{{$role->name}}</a>
                                                                    </td>
                                                                    <td>{{$role->description}}</td>
                                                                    <td style="width: 20%;">
                                                                        {!! Form::open(['route'=>['roles.destroy', $role],
                                                                        'method'=>'DELETE']) !!}

                                                                        <a class="btn btn-outline-info" href="{{route('roles.edit', $role)}}" title="Editar">
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