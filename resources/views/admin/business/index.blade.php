@extends('layouts.admin')
@section('title','Gestión de Empresa')
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
            Empresa
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-custom">
                <li class="breadcrumb-item"><a href="#">Panel administrador</a></li>
                <li class="breadcrumb-item"><a href="{{route('business.index')}}">Empresa</a></li>
                <li class="breadcrumb-item active" aria-current="page">Gestión de Empresa</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">

                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title">Información de la Empresa</h4>
                            <!-- Example split danger button -->
                            <!-- Example single danger button
                            <div class="btn-group">
                                {{-- <a dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="{{route('clients.create')}}" class="dropdown-item" type="button">Agregar</a>
                                    <button class="dropdown-item" type="button">Something else here</button>
                                    business
                                    
                                </div>
                            </div>--}} -->
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <strong><i class="fas fa-file-signature"></i> Nombre</strong>
                                <p class="text-muted">
                                    {{$business->name}}
                                </p>
                                <hr>
                                <strong><i class="fas fa-edit"></i> Descripción</strong>
                                <p class="text-muted">
                                    {{$business->description}}
                                </p>
                                <hr>
                                <strong>
                                    <i class="far fa-address-card  mr-1"></i>
                                    Dirección</strong>
                                <p class="text-muted">
                                    {{$business->address}}
                                </p>
                                <hr>
                            </div>
                            <div class="form-group col-md-6">

                                <!-- <strong><i class="fas fa-map-marked-alt mr-1"></i> Telefono</strong>
                                        <p class="text-muted">
                                            {{$business->telephone}}
                                        </p>
                                        <hr> -->
                                <strong><i class="fal fa-at mr-1"></i>Correo electrónico</strong>
                                <p class="text-muted">
                                    {{$business->email}}
                                </p>
                                <hr>
                                <strong><i class="fas fa-address-book mr-1"></i> NIT</strong>
                                <p class="text-muted">
                                    {{$business->nit}}
                                </p>
                                <hr>

                                <div class="row">
                                    <div class="col-md-6">
                                        <strong><i class="fas fa-image mr-1"></i> Logo</strong><br>
                                    </div>
                                    <div class="col-md-6">
                                        <img style="width: 60; height:50px ;" src="{{asset('image/'.$business->logo)}}" alt="logo" class="rounded float-left" />
                                    </div>
                                </div>
                                <hr>
                            </div>
                        </div>



                    </div>
                    <div class="card-footer text-muted">
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal">Actualizar</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Actualizar datos de empresa</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    
                    {!! Form::model($business,['route' =>['business.update', $business], 'method' => 'PUT', 'files' => true]) !!}

                    <div class="modal-body">
                                <div class="mb-3">
                                  <label for="name" class="form-label">Nombre</label>
                                  <input type="text" name="name" id="name" value="{{$business->name}}" class="form-control" placeholder="" aria-describedby="helpId">
                                </div>
                                <div class="mb-3">
                                  <label for="description" class="form-label">Descripción</label>
                                  <input type="text" name="description" id="description" value="{{$business->description}}" class="form-control" placeholder="" aria-describedby="helpId">
                                </div>
                                <div class="mb-3">
                                  <label for="address" class="form-label">Dirección</label>
                                  <input type="text" name="address" id="address" value="{{$business->address}}" class="form-control" placeholder="" aria-describedby="helpId">
                                </div>
                                <div class="mb-3">
                                  <label for="nit" class="form-label">Número de NIT</label>
                                  <input type="text" name="nit" id="nit" value="{{$business->nit}}" class="form-control" placeholder="" aria-describedby="helpId">
                                </div>
                                <div class="card-body">
                                    <h4 class="card-title d-flex">Logotipo de la Compañía
                                        <small class="ml-auto align-self-end">
                                            <p href="#" class="font-weight-light" target="_blank">Seleccionar archivo</p>
                                        </small>
                                    </h4>
                            <input type="file" name="picture" id="picture" class="dropify" />
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Actualizar</button>
                        <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>

        @endsection
        @section('scripts')
        {{!! Html::script('melody/js/data-table.js') !!}
        {{!! Html::script('melody/js/dropify.js') !!}
                                @endsection