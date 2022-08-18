@extends('layouts.admin')
@section('title','Administración de Facturas')
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
           Gestión de Facturas
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-custom">
                <li class="breadcrumb-item"><a href="#">Panel administrador</a></li>
                <li class="breadcrumb-item active" aria-current="page">Módulo Facturas</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Listar facturas</h4>

                        <div class="btn-group">
                            <a dropdown-toggle data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a href="{{route('bills.create')}}" class="dropdown-item" type="button">Registrar</a>
                          
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
                                                                    <th>N° Factura</th>
                                                                    <th>Cliente</th>
                                                                    <th>Fecha</th>
                                                                    <th>Vendedor</th>
                                                                    <th>IVA</th>
                                                                    <th>Total</th>
                                                                    <th style="width:150px">Acciones</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach($bills as $bill)
                                                                <tr>
                                                                    <th scope="row">
                                                                        <a href="{{route('bills.show', $bill)}}">{{$bill->id}}</a>
                                                                    </th>
                                                                    <td>{{$bill->client->name}}</td>
                                                                    <td>{{$bill->bill_date}}</td>
                                                                    <td>{{$bill->user->name}}</td>
                                                                    <td>{{$bill->tax}}</td>
                                                                    <td>{{number_format($bill->total, 3)}}</td>
                                                                    <td style="width: 100px;">
                                                                        {!! Form::open(['route'=>['bills.destroy', $bill],
                                                                        'method'=>'DELETE']) !!}

                                                                        <!-- <a class="btn btn-success" href="{{route('bills.edit', $bill)}}" title="Editar">
                                                                            <i class="far fa-edit"></i>
                                                                        </a> -->

                                                                        <button class="btn btn-danger jsgrid-button delete-confirm" type="submit" title="Eliminar">
                                                                            <i class="far fa-trash-alt"></i>
                                                                        </button> 
                                                                        {!! Form::close() !!}
                                                                        
                                                                        <a href="{{route('bills.pdf', $bill)}}" class="jsgrid-button jsgrid-edit-button"><i class="far fa-file-pdf"></i></a>
                                                                        <a href="{{route('bills.print', $bill)}}" class="jsgrid-button jsgrid-edit-button"><i class="fas fa-print"></i></a>
                                                                        <a href="{{route('bills.show', $bill)}}" class="jsgrid-button jsgrid-edit-button"><i class="far fa-eye"></i></a>
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