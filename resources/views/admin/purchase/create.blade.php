@extends('layouts.admin')
@section('title','Registrar Ventas')
@section('styles')
<style type="text/css">
    .unstyled-button {
        border: none;
        padding: 0;
        background: none;
    }
</style>
@endsection
@section('create')
@section('options')
@endsection
@section('preference')
@endsection
@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            Nueva Venta
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-custom">
                <li class="breadcrumb-item"><a href="#">Panel administrador</a></li>
                <li class="breadcrumb-item"><a href="{{route('sales.index')}}">Ventas</a></li>
                <li class="breadcrumb-item active" aria-current="page">Registro de Venta</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                {!! Form::open(['route' => 'sales.store', 'method' => 'POST']) !!}
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Listar Ventas</h4>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title">Formulario obligatorio *</h4>
                        </div>
                        

                        @include('admin.sale._form')

                      
                    </div>

                </div>
                <div class="card-footer text-muted">
                    <button type="submit" id="guardar" class="btn btn-primary mr-2 float-right">Registrar</button>
                    <a href="{{route('sales.index')}}" class="btn btn-outline-danger">Cancelar</a>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>

    @endsection
    @section('scripts')
    {!! Html::script ('melody/js/alerts.jss') !!}
    {!! Html::script ('melody/js/avgrund.js') !!}
    <script>
        $(document).ready(function() {
            $("#agregar").click(function() {
                agregar();

            })
        });

        var cont = 0;
        total = 0;
        subtotal = [];

        $("#guardar").hide();

        function agregar() {

            product_id = $("#product_id").val();
            producto = $("#product_id option:selected").text();
            quantity = $("#quantity").val();
            price =  $("#price").val();
            impuesto = $("#tax").val();


            if (product_id != "" && quantity != "" && quantity > 0 && price != "") {
                subtotal[cont] = quantity * price;
                total = total + subtotal[cont];
                var fila = '<tr class="selected" id="fila' + cont + '"><td><button type="button" class="btn btn-danger btn-sm" onclick="eliminar(' + cont + ');"><i class="fa fa-times"></i></button></td><td><input name="product_id[]" value="' + product_id + '" type="hidden">' + producto + '</td><td><input name="price[]" value="' + price + '" type="hidden"><input class="form-control" id="price[]" value="' + price + '" type="number" disabled></td><td><input type="hidden" class="form-control" name="quantity[]" value="' + quantity + '"><input type="number" class="form-control" value="' + quantity + '" disabled></td><td align="right">s/' + subtotal[cont] + '</td></tr>'
                cont++, // cont  = cont + 1;
                limpiar();
                totales();
                evaluar();
                $('#detalles').append(fila);

            } else {
                Swal.fire({
                    type: 'error',
                    text: 'Rellene todos los campos del detalle de la compra',

                })


            }

        }


        function limpiar() {
            $("#quantity").val("");
            $("#price").val("");
        }

        function totales() {
            $("#total").html("$" + total.toFixed(3));
            total_impuesto = total * impuesto / 100;
            total_pagar = total + total_impuesto;
            $("#total_impuesto").html("$" + total_impuesto.toFixed(2));
            $("#total_pagar_html").html("$" + total_pagar.toFixed(3));
            $("#total_pagar").val(total_pagar.toFixed(3));
        }


        function evaluar() {
            if (total > 0) {
                $("#guardar").show();
            } else {
                $("#guardar").hide();
            }
        }


        function eliminar(index) {
            total = total - subtotal[index];
            total_impuesto = total * impuesto / 100;
            total_pagar_html = total + total_impuesto;
            $("#total").html("COP" + total);
            $("#total_impuesto").html("COP" + total_impuesto);
            $("#total_pagar_html").html("COP" + total_pagar_html);
            $("#total_pagar").val(total_pagar_html.toFixed(3));
            $("#fila" + index).remove();
            evaluar();
        }
    </script>

    @endsection