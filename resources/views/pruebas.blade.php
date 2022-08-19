@extends('layouts.admin')
@section('title','Gestión de productos')
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
            Productos
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-custom">
                <li class="breadcrumb-item"><a href="#">Panel administrador</a></li>
                <li class="breadcrumb-item active" aria-current="page">Productos</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="products_listing" class="table">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Nombre</th>
                                    <th>Stock</th>
                                    <th>Precio de venta</th>
                                    <th>Estado</th>
                                    <th>Categoría</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($products as $product)
                                <tr>
                                    <th>{{$product->id}}</th>
                                    <th>{{$product->name}}</th>
                                </tr>
                                @empty
                                <tr>
                                    <td>SIN PRODUCTOS</td>
                                </tr>
                                @endforelse
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


DELIMITER ;
    CREATE TRIGGER 'tr_updStockCompra' AFTER INSERT ON 'purchase_details'
    FOR EACH ROW BEGIN 
    UPDATE products SET stock = stock NEW.quantity
    WHERE products.id = NEW.product_id;

END;

DELIMITER;

DELIMITER //
    CREATE TRIGGER 'tr_updStockCompraAnular' AFTER UPDATE ON 'purchases'
    FOR EACH ROW BEGIN
    UPDATE products p
    JOIN shopping_details di
    ON di.product_id = p.id
    AND di.purchase_date = new.id
    set p.stock = p.stock = di.quantity

end;

DELIMITER;

DELIMITER //
    CREATE TRIGGER 'tr_updStockVenta' AFTER INSERT ON 'sale_details'
    FOR EACH ROW BEGIN 
    UPDATE products SET stock = stock - NEW.quantity
    WHERE products.id = NEW.product_id;

END;
DELIMITER;


DELIMITER //
    CREATE TRIGGER 'tr_updStockVentaAnular' AFTER UPDATE ON 'sales'
    FOR EACH ROW BEGIN
    UPDATE products p
    JOIN sale_details dv
    ON dv.product_id = p.id
    AND dv.sale_id = new.id
    set p.stock = p.stock = dv.quantity

end;

//
DELIMITER;


