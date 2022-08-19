@extends('layouts.admin')
@section('title','Reporte por fecha')
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
            Reporte por fecha
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-custom">
                <li class="breadcrumb-item"><a href="#">Panel administrador</a></li>
                <li class="breadcrumb-item active" aria-current="page">Reporte por fecha</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <!-- <h4 class="card-title">Reporte por fecha</h4> -->
                        
                            <div class="btn-group">
                                <a dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <!-- <i class="fas fa-ellipsis-v"></i> -->
                                </a>
                               
                            </div>
                        </div>
                            {!! Form::open(['route' => 'report.results', 'method' => 'POST']) !!}

                        <div class="row ">
                        <div class="col-12 col-md-3">
                            <span>Fecha inicial</span>
                                <div class="form-group">
                                <input type="date" name="fecha_ini" id="fecha_ini" value="{{old('fecha_ini')}}">
                                </div>
                        </div>
                        <div class="col-12 col-md-3">
                            <span>Fecha Final</span>
                            <div class="form-group">
                                <input type="date" name="fecha_fin" id="fecha_fin" value="{{old('fecha_fin')}}">
                            </div>
                        </div>
                        <div class="col-12 col-md-2 text-center mt-4">
                            <button type="submit" class="btn btn-primary btn-sm">Consultar</button>
                        </div>
                        <div class="col-12 col-md-4 text-center">
                            <span>Total de ingresos: <b> </b></span>
                            <div class="form-group">
                                <strong>valor: {{$total}}</strong>
                            </div>
                        </div>
                    </div>
                            {!! Form::close() !!}

                        <div class="table-responsive">
                            <table id="sales_listing" class="table">
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
                                                                    <td>{{$sale->total}}</td>
                                                                    <td>{{$sale->status}}</td>
                                                                    <td style="width: 100px;">
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
                                {{!! Html::script('melody/js/data-table.js') !!}
                                <script>
                                        window.onload = function(){
                                        var fecha = new Date(); //Fecha actual
                                        var mes = fecha.getMonth()+1; //obteniendo mes
                                        var dia = fecha.getDate(); //obteniendo dia
                                        var ano = fecha.getFullYear(); //obteniendo año
                                        if(dia<10)
                                        dia='0'+dia; //agrega cero si el menor de 10
                                        if(mes<10)
                                        mes='0'+mes //agrega cero si el menor de 10
                                        document.getElementById('fecha_fin').value=ano+"-"+mes+"-"+dia;
                                        }
                                </script>
                                @endsection