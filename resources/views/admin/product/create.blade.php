@extends('layouts.admin')
@section('title','Registrar Producto')
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
            Formulario obligatorio
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-custom">
                <li class="breadcrumb-item"><a href="#">Panel administrador</a></li>
                <li class="breadcrumb-item"><a href="{{route('products.index')}}">Productos</a></li>
                <li class="breadcrumb-item active" aria-current="page">Registro de Productos</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Registro de Productos</h4>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title">Productos</h4>
                        </div>
                        {!! Form::open(['route' => 'products.store', 'method' => 'POST', 'files' => true]) !!}

                        <div class="form-group col-md-6 mb-3">
                            <label for="name" class="form-label">Nombre *</label>
                            <input type="text" class="form-control" name="name" id="name" required>
                        </div>
                        <div class="form-group col-md-8">
                            <label for="code">Código de Barras</label>
                            <input id="code" class="form-control" type="number" name="code">
                            <small class="text-muted">Este campo es opcional</small>
                        </div>
                        <div class="form-group col-md-6 mb-3">
                            <label for="sell_price" class="form-label">Precio *</label>
                            <input type="text" class="form-control" name="sell_price" id="sell_price" required>
                        </div>
                        <div class="form-group col-md-6 mb-3">
                            <label for="category_id" class="form-label">Categoría *</label>
                            <select id="category_id" class="form-control" name="category_id" required>
                                @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-6 mb-3">
                            <label for="provider_id" class="form-label">Proveedor</label>
                            <select id="provider_id" class="form-control" name="provider_id" required>
                                @foreach($providers as $provider)
                                <option value="{{$provider->id}}">{{$provider->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="card-body">
                            <h4 class="card-title d-flex">Imagen del Producto
                                <small class="ml-auto align-self-end">
                                    <p href="#" class="font-weight-light" target="_blank">Seleccionar archivo</p>
                                </small>
                            </h4>
                            <input type="file" name="picture" id="picture" class="dropify" />
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary mr-2 btn-confirm">Registrar</button>
                    <a href="{{route('products.index')}}" class="btn btn-outline-danger">Cancelar</a>
                    {!! Form::close() !!}
                </div>

            </div>
        </div>
    </div>
</div>

@endsection
@section('scripts')
{{!! Html::script('melody/js/data-table.js') !!}
    {{!! Html::script('melody/js/dropify.js') !!}

    <script>
                                           $('.btn-confirm').click(function(event) {

                                            var form = $(this).closest("form");
                                            var name = $(this).data("name");   
                                            event.preventDefault();
                                            swal({
                                                title: 'Producto registrado con éxito',
                                                icon: 'success',
                                                buttons: true,
                                                dangerMode: true,
                                            })
                                             
                                            .then((willRegister) => {
                                                if (willRegister) {
                                                    form.submit();
                                                }
                                            }); 

                                            });   

             </script>
                                @endsection