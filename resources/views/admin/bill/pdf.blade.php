<!DOCTYPE>
<html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Resumen</title>
<style>
    body {
        /*position: relative;*/
        /*width: 16cm;  */
        /*height: 29.7cm; */
        /*margin: 0 auto; */
        /*color: #555555;*/
        /*background: #FFFFFF; */
        font-family: Arial, sans-serif;
        font-size: 14px;
        /*font-family: SourceSansPro;*/
    }


    #datos {
        float: left;
        margin-top: 0%;
        margin-left: 2%;
        margin-right: 2%;
        /*text-align: justify;*/
    }

    #encabezado {
        text-align: center;
        margin-left: 35%;
        margin-right: 35%;
        font-size: 15px;
    }

    #fact {
        /*position: relative;*/
        float: right;
        margin-top: 2%;
        margin-left: 2%;
        margin-right: 2%;
        font-size: 20px;
        background: #33AFFF;
    }

    section {
        clear: left;
    }

    #cliente {
        text-align: left;
    }

    #faproveedor {
        width: 40%;
        border-collapse: collapse;
        border-spacing: 0;
        margin-bottom: 15px;
        color: #33FF55;
        font-size: 15px;
    }

    #fac,
    #fv,
    #fa {
        color: #FFFFFF;
        font-size: 15px;
    }

    #faproveedor thead {
        padding: 20px;
        background: #33AFFF;
        text-align: left;
        border-bottom: 1px solid #FFFFFF;
    }

    #faccomprador {
        width: 100%;
        border-collapse: collapse;
        border-spacing: 0;
        margin-bottom: 15px;
    }

    #faccomprador thead {
        padding: 20px;
        background: #33AFFF;
        text-align: center;
        border-bottom: 1px solid #FFFFFF;
    }

    #facproducto {
        width: 100%;
        border-collapse: collapse;
        border-spacing: 0;
        margin-bottom: 15px;
    }

    #facproducto thead {
        padding: 20px;
        background: #33AFFF;
        text-align: center;
        border-bottom: 1px solid #FFFFFF;
    }

</style>

<body>
  
    <header>
        <!-- {{--  <div id="logo">
            <img src="img/logo.jpg" alt="" id="imagen">
        </div>  --}} -->
        <div>
            <table id="datos">
                <thead>
                    <tr>
                        <th id="proveedor">FACTURAR A </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>
                            <p id="proveedor">Nombre : {{ $bill->client->name }} </p>
                            <p>Dirección : {{ $bill->client->address }} </p>
                            <p>Celular : {{ $bill->client->phone }} </p>
                            <p>Correo : {{$bill->client->email }} </p>
                        </th>
                    </tr>
                </tbody>
            </table>
        </div>
        <div id="fact">
            <!-- {{--  <p>{{$bill->provider->document_type}} VENTA<br />
                {{$bill->provider->document_number}}</p>  --}}-->
                <p>NUMERO DE FACTURA<br /> 
                    {{$bill->id}}</p>
        </div>
    </header>
    <br>

   
    <br>
    <section>
        <div>
            <table id="faccomprador">
                <thead>
                    <tr id="fv">
                        <th>FECHA</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <!-- <td>{{$bill->user->name}}</td> -->
                        <td class="col-md-6">{{$bill->created_at}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>
    <br>
    <section>
        <div>
            <table id="facproducto">
                <thead>
                    <tr id="fa">
                        <th>CANTIDAD</th>
                        <th>PRODUCTO</th>
                        <th>PRECIO UNIT.</th>
                        <th>SUBTOTAL</th>
                    </tr>
                </thead>
                <tbody>
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
                </tbody>
                <tfoot>
                 
                    <tr>
                        <th colspan="3">
                            <p align="right">SUBTOTAL:</p>
                        </th>
                        <td>
                            <p align="right">s/ {{number_format($subtotal,3)}}<p>
                        </td>
                    </tr>
                  
                    <tr>
                        <th colspan="3">
                            <p align="right">TOTAL IMPUESTO ({{$bill->tax}}%):</p>
                        </th>
                        <td>
                            <p align="right">s/ {{number_format($subtotal*$bill->tax/100,2)}}</p>
                        </td>
                    </tr>
                    <tr>
                        <th colspan="3">
                            <p align="right">TOTAL PAGAR:</p>
                        </th>
                        <td>
                            <p align="right">s/ {{number_format($bill->total,3)}}<p>
                        </td>
                    </tr>
                  
                </tfoot>
            </table>
        </div>
    </section>
    <br>
    <br>
    <footer>
        <!--puedes poner un mensaje aqui-->
        <p>Gracias por tu compra y por elegirnos que vuelvas pronto!</p>
        <small><i class="fas fa-heart">Morgan Store</i></small>

        <div id="datos">
            <p id="encabezado">
                <!-- {{--  <b>{{$company->name}}</b><br>{{$company->description}}<br>Telefono:{{$company->telephone}}<br>Email:{{$company->email}}  --}} -->
            </p>
        </div>
    </footer>
</body>

</html>