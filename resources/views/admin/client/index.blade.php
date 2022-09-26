@extends('layouts.admin')
@section('title','Gestión de Clientes')
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
            Clientes
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-custom">
                <li class="breadcrumb-item"><a href="#">Panel administrador</a></li>
                <li class="breadcrumb-item"><a href="{{route('clients.index')}}">Clientes</a></li>
                <li class="breadcrumb-item active" aria-current="page">Registro de clientes</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title">Listar clientes</h4>
                            <!-- Example split danger button -->
                            <!-- Example single danger button -->
                            <div class="btn-group">
                                <a dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="{{route('clients.create')}}" class="dropdown-item" type="button">Agregar</a>
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
                                                <div class="col-lg-6 col-12 mx-auto">
                                                    @if(Session::has('message'))
                                                        <div class="alert alert-success text-center" role="alert">
                                                            <i class="fas fa-check-circle"> {{Session::get('message')}}</i>
                                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                            </button>   
                                                        </div>
                                                    @endif
                                                </div>
                                                    <div class="col-sm-12">
                                                        <table id="order-listing" class="table dataTable no-footer" role="grid" aria-describedby="order-listing_info">
                                                            <thead>
                                                                <tr>
                                                                    <th>Id</th>
                                                                    <th>Nombre</th>
                                                                    <th>Identificación</th> 
                                                                    <th>Teléfono / Celular</th>
                                                                    <th>Correo electrónico</th> 
                                                                    <th>Acciones</th>
                                                                       
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach($clients as $client)
                                                                <tr>
                                                                    <th scope="row">{{$client->id}}</th>
                                                                    <td>
                                                                        <a href="{{ route('clients.show', $client) }}">{{$client->name}}</a>
                                                                    </td>
                                                                    <td>{{$client->dni}}</td>
                                                                    <td>{{$client->phone}}</td>
                                                                    <td>{{$client->email}}</td>
                                                                    <td style="width: 20%;">
                                                                        {!! Form::open(['route'=>['clients.destroy', $client],
                                                                        'method'=>'DELETE']) !!}

                                                                        <a class="btn btn-outline-info" href="{{route('clients.edit', $client)}}" title="Editar">
                                                                            <i class="far fa-edit"></i>
                                                                        </a>

                                                                        <button class="btn btn-outline-danger delete-confirm" type="submit" title="Eliminar">
                                                                            <i class="far fa-trash-alt"></i>
                                                                        </button>
                                                                        {!! Form::close() !!}

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
                                {!! Html::script('melody/js/data-table.js') !!}
                                <script>
                                       $('.delete-confirm').click(function(event) {

                                        var form = $(this).closest("form");
                                        var name = $(this).data("name");   
                                        event.preventDefault();
                                        swal({
                                            title: 'Estas seguro de eliminar a {{$client->name}}?',
                                            text: 'No podrá revertir cambios',
                                            icon: 'warning',
                                            buttons: true,
                                            dangerMode: true,
                                        })
                                        
                                        .then((willDelete) => {
                                            if (willDelete) {
                                                form.submit();
                                            }
                                        }); 

                                        }); 
                                </script>
                                @endsection