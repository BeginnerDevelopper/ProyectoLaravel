@extends('layouts.admin')
@section('title','Registrar Ventas')
@section('styles')
{!! Html::style('select/dist/css/bootstrap-select.min.css') !!}
<style type="text/css">
    .unstyled-button {
        border: none;
        padding: 0;
        background: none;
    }
</style>
@endsection
@section('create')
<li class="nav-item d-none d-lg-flex">
    <a class="nav-link" type="button" data-toggle="modal" data-target="#exampleModal-2">
        <span class="btn btn-info">+ Registrar cliente</span>
    </a>
</li>
@endsection
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
                        <!-- <h4 class="card-title">Listar Ventas</h4> -->
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

 <!-- Modal -->
 <div class="modal fade" id="exampleModal-2" tabindex="-1" role="dialog" aria-labelledby="exampleModal-2" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-dark">
                    <h5 class="modal-title text-light" id="exampleModal-2">Registrar Cliente</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                {!! Form::open(['route' => 'clients.store', 'method' => 'POST' ]) !!}

                <div class="modal-body">
                    <div class="form-group col-md-12 mb-3">
                        <label for="name" class="form-label">Nombre *</label>
                        <input type="text" class="form-control" name="name" id="name" aria-describedby="helpId" required>
                    </div>
                    <div class="form-group col-md-12 mb-3">
                        <label for="dni" class="form-label">Identificación *</label>
                        <input type="number" class="form-control" name="dni" id="dni" aria-describedby="helpId">
                    </div>
                    <div class="form-group col-md-12 mb-3">
                        <label for="phone" class="form-label">Telefono/Celular *</label>
                        <input type="number" class="form-control" name="phone" id="phone" aria-describedby="helpId">
                    </div>

                    <input type="hidden" name="sale" value="1">

                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-outline-primary">Registrar</button>
                    <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cancelar</button>
                </div>

                {!!Form::close()!!}

            </div>
        </div>
    </div>






    @endsection
    @section('scripts')
    {!! Html::script ('melody/js/alerts.jss') !!}
    {!! Html::script ('melody/js/avgrund.js') !!}
    {!! Html::script ('select/dist/js/bootstrap-select.js') !!}
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
        $("#product_id").change(mostrarValores);

        function mostrarValores() {
            datosProducto = document.getElementById('product_id').value.split('_');
            $("#price").val(datosProducto[2]);
            $("#stock").val(datosProducto[1]);
        }

        var product_id = $('#product_id');

        product_id.change(function() {

            $.ajax({

                url: "{{route('get_products_by_id')}}",
                method: 'GET',
                data: {
                    product_id: product_id.val(),
                },
                success: function(data) {
                    $("#price").val(data.sell_price);
                    $("#stock").val(data.stock);
                    $("#code").val(data.code);
                }
            });

        });




        $(obtener_registro(code));

        function obtener_registro(code) {
            $.ajax({
                url: "{{route('get_products_by_barcode')}}",
                type: 'GET',
                data: {
                    code: code

                },
                success: function(data) {

                    $("#price").val(data.price);
                    $("#stock").val(data.stock);
                }
            });
        }

        $(document).on('keyup', '#code', function() {

            var valorResultado = $(this).val();
            if (valorResultado != "") {
                obtener_registro(valorResultado);
            } else {
                obtener_registro();
            }
        });


        function agregar() {
            datosProducto = document.getElementById('product_id').value.split('_');

            product_id = datosProducto[0];
            producto = $("#product_id option:selected").text();
            quantity = $("#quantity").val();
            discount = $("#discount").val();
            price = $("#price").val();
            stock = $("#stock").val();
            impuesto = $("#tax").val();

            if (product_id != "" && quantity != "" && quantity > 0 && discount != "" && price != "") {
                if (parseInt(stock) >= parseInt(quantity)) {
                    subtotal[cont] = (quantity * price) - (quantity * price * discount / 100);
                    total = total + subtotal[cont];
                    var fila = '<tr class="selected" id="fila' + cont + '"><td><button type="button" class="btn btn-danger btn-sm" onclick="eliminar(' + cont + ');"><i class="fa fa-times fa-2x"></i></button></td><td><input name="product_id[]" value="' + product_id + '" type="hidden">' + producto + '</td><td><input name="price[]" value="' + parseFloat(price).toFixed(3) + '" type="hidden"><input class="form-control" id="price[]" value="' + parseFloat(price).toFixed(3) + '" type="number" disabled></td><td><input type="hidden" class="form-control" name="discount[]" value="' + parseFloat(discount) + '"><input type="number" class="form-control" value="' + parseFloat(discount) + '" disabled></td><td><input type="hidden" class="form-control" name="quantity[]" value="' + quantity + '"><input type="number" class="form-control" value="' + quantity + '" disabled></td><td align="right">s/' + parseFloat(subtotal[cont]).toFixed(3) + '</td></tr>'
                    cont++, // cont  = cont + 1;
                    limpiar();
                    totales();
                    evaluar();
                    $('#detalles').append(fila);
                } else {
                    Swal.fire({
                        type: 'error',
                        text: 'Stock no disponible!',

                    })

                }

            } else {
                Swal.fire({
                    type: 'error',
                    text: 'Rellene todos los campos del detalle de la venta',

                })


            }

        }


        function limpiar() {
            $("#quantity").val("");
            $("#discount").val("0");
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