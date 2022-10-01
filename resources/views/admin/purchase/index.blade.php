@extends('layouts.admin')
@section('title','Gestión de Compras')
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
            Compras
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-custom">
                <li class="breadcrumb-item"><a href="#">Panel administrador</a></li>
                <li class="breadcrumb-item active" aria-current="page">Compras</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <!-- <div class="d-flex justify-content-between">
                        <h4 class="card-title">Listar Compras</h4>
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
                            <h4 class="card-title">Compras</h4>
                            <!-- Example split danger button -->
                            <!-- Example single danger button -->
                            <div class="btn-group">
                                <a dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="{{route('purchases.create')}}" class="dropdown-item" type="button">Registrar</a>
                                    <!-- <button class="dropdown-item" type="button">Another action</button>
                                    <button class="dropdown-item" type="button">Something else here</button>
                                     -->
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table id="purchases_listing" class="table">
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
                                                                @foreach($purchases as $purchase)
                                                                <tr>
                                                                    <th scope="row">
                                                                        <a href="{{route('purchases.show', $purchase)}}">{{$purchase->id}}</a>
                                                                    </th>
                                                                    <td>{{$purchase->purchase_date}}</td>
                                                                    <td>{{number_format($purchase->total),3}}</td>
                                                                    @if($purchase->status == 'VALID')
                                                                    <td>
                                                                        <a class="btn btn-success" href="{{route('change.status.purchases', $purchase)}}" role="button">
                                                                            Activo <i class="fas fa-check"></i></a>
                                                                        </a>

                                                                    </td>
                                                                    @else
                                                                    <td>
                                                                        <a class="btn btn-danger" href="{{route('change.status.purchases', $purchase)}}" role="button">
                                                                            Cancelado<i class="fas fa-times"></i></a>
                                                                    </td>
                                                                    @endif
                                                                    <td style="width: 100px;">
                                                                        <!-- {!! Form::open(['route'=>['purchases.destroy', $purchase],
                                                                        'method'=>'DELETE']) !!} -->

                                                                        <!-- <a class="btn btn-success" href="{{route('purchases.edit', $purchase)}}" title="Editar">
                                                                            <i class="far fa-edit"></i>
                                                                        </a> -->

                                                                        <!-- <button class="btn btn-danger jsgrid-button delete-confirm" type="submit" title="Eliminar">
                                                                            <i class="far fa-trash-alt"></i>
                                                                        </button> -->
                                                                                <a href="{{route('purchases.pdf', $purchase)}}" class="jsgrid-button jsgrid-edit-button"><i class="far fa-file-pdf"></i></a>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               
                                                                                <!-- <a href="#" class="jsgrid-button jsgrid-edit-button"> <i class="fas fa-print"></i></a>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                     -->
                                                                                <a href="{{route('purchases.show', $purchase)}}"  class="jsgrid-button jsgrid-edit-button"><i class="far fa-eye"></i></a>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    
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