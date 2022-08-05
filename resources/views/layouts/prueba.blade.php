
    $(document).ready(function(){
        $("#agregar").click(function () {
            agregar();

        })
    });

    var cont=0;
    total = 0;
    subtotal=[];

    $("#agregar").hide();

    function agregar(){

            product_id = $("#product_id").val();
            producto = $("#product_id option:selected").text();
            quantity = $("#quantity").val();
            price = $("#price").val();
            impuesto = $("#tax").val();
    

            if(product_id != "" && quantity != "" && quantity > 0 && price != "") 
            {
                    subtotal[cont] = quantity * price;
                    total = total + subtotal[cont];
                    var fila = '<tr class="selected" id="fila'+ cont +'"><td><button type="button"></button></td></tr>'
                    cont++,// cont  = cont + 1;
                    limpiar();
                    totales();
                    evaluar();
                    $('#detalles').append(fila);

            }else {
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

            function totales(){
                $("#total").html("PEN" + total.toFixed(2));
                total_impuesto = total * impuesto/100;
                total_pagar = total * total + total_impuesto;
                $("#total_impuesto").html("PEN" + total_impuesto.toFixed(2));
                $("#total_pagar_html").html("PEN" + total_pagar.toFixed(2));
                $("#total_pagar").val("PEN" + total_pagar.toFixed(2));
            }


            function evaluar() {
                if (total>0) {
                    $("#guardar").show();
                }else{
                    $("#guardar").hide();
                }
            }


            function eliminar(index) {
                total = total - subtotal[index];
                total_impuesto = total * impuesto/100;
                total_pagar_html = total + total_impuesto;
                $("#total").html("COP" + total);
                $("#total_impuesto").html("COP" + total_impuesto);
                $("#total_pagar_html").html("COP" + total__html);
                $("#total_pagar").val(total_pagar_html.toFiexed(2));
                $("#fila" + index).remove();
                evaluar();
            }

            

