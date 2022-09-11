<div class="form-group">
    <label for="code">Code</label>
    <input id="code" class="form-control" type="text">
</div>

<div class="row">
    <div class="form-group col-md-6">
        <label for="client_id">Cliente</label>
        <select id="client_id" class=" form-control selectpicker" data-live-search="true" name="client_id">
            <option value="" disabled>Seleccione un cliente</option>
            @foreach($clients as $client)
            <option value="{{$client->id}}">{{$client->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group col-md-6">
        <label for="product_id">Producto</label>
        <select id="product_id" class=" form-control selectpicker" data-live-search="true" name="product_id">
            <option value="" disabled>Seleccione un producto</option>
            @foreach($products as $product)
            <option value="{{$product->id}}_{{$product->stock}}_{{$product->sell_price}}">{{$product->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group col-5">
        <label for="tax">IVA</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon3">%</span>
            </div>
            <input type="number" id="tax" name="tax" class="form-control" aria-label="tax" aria-describedby="basic-addon1">
        </div>
    </div>
    <div class="form-group col-md-2">
        <div class="mb-3 form-floating">
            <label for="quantity">Cantidad</label>
            <input type="number" name="quantity" id="quantity" class="form-control">
        </div>
    </div>
    <div class="form-group mb-3 col-md-2">
        <label for="">Stock actual</label>
        <input type="text" name="stock" id="stock" class="form-control" disabled>
    </div>
    <div class="form-group col-md-5">
        <div class="mb-3 form-floating">
            <label for="price">Precio de venta</label>
            <input type="number" name="price" id="price" class="form-control" disabled>
        </div>
    </div>
    <div class="form-group col-3">
        <label for="discount">Descuento</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">%</span>
            </div>
            <input type="number" name="discount" id="discount" class="form-control" placeholder="Descuento" aria-describedby="helpId">
        </div>
    </div>
</div>
<div class="form-group mb-4">
    <button type="button" class="btn btn-primary float-right" id="agregar">Agregar producto</button>
</div>


<div class="form-group mb-3">
    <h4 class="card-title">Detalles de venta</h4>
    <div class="table-responsive col-md-12">
        <table id="detalles" class="table table-striped">
            <thead>
                <tr>
                    <th>Eliminar</th>
                    <th>Producto</th>
                    <th>Precio de Venta</th>
                    <th>Descuento</th>
                    <th>Cantidad</th>
                    <th>SubTotal</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th colspan="4">
                        <p align="right">TOTAL:</p>
                    </th>
                    <th>
                        <p align="right"><span id="total">Valor 0.000</span> </p>
                    </th>
                </tr>
                <tr>
                    <th colspan="4">
                        <p align="right">TOTAL IMPUESTO (19%):</p>
                    </th>
                    <th>
                        <p align="right"><span id="total_impuesto">Valor 0.00</span></p>
                    </th>
                </tr>
                <tr>
                    <th colspan="4">
                        <p align="right">TOTAL PAGAR:</p>
                    </th>
                    <th>
                        <p align="right"><span align="right" id="total_pagar_html">$ 0.000</span>
                            <input type="hidden" name="total" id="total_pagar">
                        </p>
                    </th>
                </tr>
            </tfoot>
            <tbody>
            </tbody>
        </table>
    </div>
</div>

   