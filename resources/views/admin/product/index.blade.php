@extends('layouts.admin')
@section('title','Gestión de Productos')
@section('styles')

@endsection
@section('create')

<li class="nav-item d-none d-lg-flex">
    <a class="nav-link" href="{{route('products.create')}}">
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
            Productos
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-custom">
                <li class="breadcrumb-item"><a href="#">Panel administrador</a></li>
                <li class="breadcrumb-item"><a href="{{route('products.index')}}">Productos</a></li>
                <li class="breadcrumb-item active" aria-current="page">Registro de productos</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title">Products</h4>
                            <!-- Example split danger button -->
                            <!-- Example single danger button -->
                            <div class="btn-group">
                                <a dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="{{route('products.create')}}" class="dropdown-item" type="button">Agregar</a>
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
                                                                     <!-- 'code',
                                                                        'name' ,       
                                                                        'stock',
                                                                        'image',
                                                                        'sell_price',
                                                                        'status',
                                                                        'category_id',
                                                                        'provider_id', -->
                                                                    <th>Id</th>
                                                                    <th>Nombre</th>
                                                                    <th>Stock</th> 
                                                                    <th>Precio</th>
                                                                    <th>Estado</th> 
                                                                    <th>Categoría</th> 
                                                                    <th>Acciones</th>
                                                                       
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach($products as $product)
                                                                <tr>
                                                                    <th scope="row">{{$product->id}}</th>
                                                                    <td>
                                                                        <a href="{{ route('products.show', $product) }}">{{$product->name}}</a>
                                                                    </td>
                                                                    <td>{{$product->stock}}</td>
                                                                    <td>{{$product->sell_price}}</td>
                                                                    <td>{{$product->status}}</td>
                                                                    <td>{{$product->category->name}}</td>
                                                                    <td style="width: 20%;">
                                                                        {!! Form::open(['route'=>['products.destroy', $product],
                                                                        'method'=>'DELETE']) !!}

                                                                        <a class="btn btn-outline-info" href="{{route('products.edit', $product)}}" title="Editar">
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