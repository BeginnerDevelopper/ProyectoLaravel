<div class="container">
<div class="row justify-content-start">
<div class="form-group col-md-5">
    <label for="code">Código de Barras</label>  
    <input id="code" class="form-control" type="text" name="code" disabled>
    <small class="text-muted">Mínimo 8 carácteres</small>
</div>
<div class="form-group col-md-5">
    <label for="provider_id">Proveedor</label>
    <select id="provider_id" class="form-control" name="provider_id">
        @foreach($providers as $provider)
        <option value="{{$provider->id}}">{{$provider->name}}</option>
        @endforeach
    </select>
</div>
</div>
<div class="row justify-content-evenly">
<div class="form-group col-md-6">
    <label for="product_id">Producto</label>
    <select id="product_id" class="form-control select-picker" data-live-search="true" name="product_id">
        <option value="" disabled>Selecciona un producto</option>
        @foreach($products as $product)
        <option value="{{$product->id}}_{{$product->code}}_{{$product->sell_price}}">{{$product->name}}</option>
        @endforeach
    </select>
</div>
<div class="form-group col-md-3">
    <label for="tax">IVA</label>
    <div class="input-group">
        <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon3">%</span>
        </div>
        <input type="number" class="form-control" name="tax" id="tax" aria-describedby="basic-addon3" value="18">
    </div>
</div>
</div>
</div>
<div class="form-group col-md-6">
    <div class="mb-3 form-floating">
        <label for="quantity">Cantidad</label>
        <input type="number" name="quantity" id="quantity" class="form-control">
    </div> 
</div>
<div class="form-group col-md-6">
    <div class="mb-3 form-floating">
        <label for="price">Precio de compra</label>
        <input type="decimal(9,2)" name="price" id="price" class="form-control" disabled>
    </div>
</div>
<div class="form-group mb-4">
    <button type="button" class="btn btn-primary float-right" id="agregar">Agregar producto</button>
</div>

<div class="form-group mb-3">
    <h4 class="card-title">Detalles de compra</h4>
    <div class="table-responsive col-md-12">
        <table id="detalles" class="table table-striped">
            <thead>
                <tr>
                    <th>Eliminar</th>
                    <th>Producto</th>
                    <th>Precio(COP)</th>
                    <th>Cantidad</th>
                    <th>SubTotal(COP)</th>
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