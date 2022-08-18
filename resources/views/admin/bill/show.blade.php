DETALLES FACTURA
@extends('layouts.admin')
@section('title','Detalles de factura')
@section('styles')

@endsection
@section('create')

@endsection
@section('options')

@endsection
@section('preference')

@endsection
@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            Detalles de Factura
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Panel administrador</a></li>
                <li class="breadcrumb-item"><a href="#">Facturación</a></li>
                <li class="breadcrumb-item active" aria-current="page">Detalle de factura</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <div class="form-group row">
                    <div class="col-md-4 text-center">
                            <label for="" class="form-label">N° Factura</label>
                            <p>{{$bill->id}}</p>
                        </div>
                        <div class="col-md-4 text-center">
                            <label for="" class="form-label">Cliente</label>
                            <p><a href="{{route('clients.show', $bill->client)}}">{{$bill->client->name}}</a></p>
                        </div>
                        <div class="col-md-4 text-center">
                            <label for="" class="form-label">Empleado</label>
                            <p>{{$bill->user->name}}</p>
                        </div>
                        
                    </div>
                    <br></br>
                    <div class="form-group">
                        <h4 class="card-title">Detalles de factura</h4>
                        <div class="table-responsive col-md-12">
                            <table id="billDetails" class="table">
                                <thead>
                                    <tr>
                                        <th>Descripción</th>
                                        <th>Precio venta</th>
                                        <th>Cantidad</th>
                                        <th>SubTotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tfoot>
                                    <tr>
                                        <th colspan="4">
                                            <p align="right">TOTAL IMPUESTO ({{$bill->tax}}%)</p>
                                        </th>
                                        <th colspan="4">
                                            <p align="right">s/{{number_format($subtotal*$bill->tax/100,2)}}</p>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th colspan="4">
                                            <p align="right">TOTAL:</p>
                                        </th>
                                        <th colspan="4">
                                            <span ></span>
                                            <p align="right">s/{{number_format($bill->total,3)}}</p>
                                        </th>
                                    </tr>
                                    </tfoot>
                                    </tbody>
                                        @foreach($billDetails as $billDetail)
                                        <tr>
                                            <td>{{$billDetail->product->name}}</td>
                                            <td>s/{{$billDetail->price}}</td>
                                            <td>{{$billDetail->quantity}}</td>
                                            <td>s/{{number_format($billDetail->quantity*$billDetail->price - 
                                                $billDetail->quantity*$billDetail->price * 
                                                $billDetail->discount/100,3)}}
                                            </td>
                                    </tr>
                                    @endforeach
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-muted">
                    <a href="{{route('bills.index')}}" class="btn btn-info float-right">Regresar</a>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
@section('scripts')
{!! Html::script('melody/js/profile-demo.js') !!}
{!! Html::script('melody/js/data-table.js') !!}
@endsection