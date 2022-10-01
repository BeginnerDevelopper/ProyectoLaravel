@extends('layouts.admin')
@section('title','Gestión de Ventas')
@section('styles')

@endsection
@section('create')
<style type="text/css">
    .unstyled-button {
        border: none;
        padding: 0;
        background: none;
    }
</style>
@section('options')
@endsection
@section('preference')
@endsection
@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            Ventas
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-custom">
                <li class="breadcrumb-item"><a href="#">Panel administrador</a></li>
                <li class="breadcrumb-item active" aria-current="page">Módulo Ventas</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Listar Ventas</h4>

                        <div class="btn-group">
                            <a dropdown-toggle data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a href="{{route('sales.create')}}" class="dropdown-item" type="button">Registrar</a>
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
                                                                <th>Fecha</th>
                                                                <th>Total</th>
                                                                <th>Estado</th>
                                                                <th style="width:150px">Acciones</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach($sales as $sale)
                                                            <tr>
                                                                <th scope="row">
                                                                    <a href="{{route('sales.show', $sale)}}">{{$sale->id}}</a>
                                                                </th>
                                                                <td>{{$sale->sale_date}}</td>
                                                                <td>{{number_format($sale->total)}}</td>
                                                                @if($sale->status == 'VALID')
                                                                <td>
                                                                    <a class="jsgrid-button btn btn-success" href="{{route('change.status.sales', $sale)}}" role="button">
                                                                        Activo <i class="fas fa-check"></i></a>
                                                                    </a>

                                                                </td>
                                                                @else
                                                                <td>
                                                                    <a class="jsgrid-button btn btn-danger" href="{{route('change.status.sales', $sale)}}" role="button">
                                                                        Cancelado<i class="fas fa-times"></i></a>
                                                                </td>
                                                                @endif

                                                                <td style="width: 100px;">
                                                                    <!-- {!! Form::open(['route'=>['sales.destroy', $sale],
                                                                        'method'=>'DELETE']) !!} -->

                                                                    <!-- <a class="btn btn-success" href="{{route('sales.edit', $sale)}}" title="Editar">
                                                                            <i class="far fa-edit"></i>
                                                                        </a> -->

                                                                    <!-- <button class="btn btn-danger jsgrid-button delete-confirm" type="submit" title="Eliminar">
                                                                            <i class="far fa-trash-alt"></i>
                                                                        </button>  -->
                                                                    <a href="{{route('sales.pdf', $sale)}}" class="jsgrid-button jsgrid-edit-button"><i class="far fa-file-pdf"></i></a>
                                                                    <a href="{{route('sales.print', $sale)}}" class="jsgrid-button jsgrid-edit-button"><i class="fas fa-print"></i></a>
                                                                    <a href="{{route('sales.show', $sale)}}" class="jsgrid-button jsgrid-edit-button"><i class="far fa-eye"></i></a>
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
                            @endsection