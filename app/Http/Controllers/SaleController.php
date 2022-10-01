<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Client;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\Sale\StoreRequest;
use App\Http\Requests\Sale\UpdateRequest;
use PDF;
use RealRashid\SweetAlert\Facades\Alert;

use Mike42\Escpos\PrinterConnectors\FilePrintConnextor;
use Mike42\Escpos\Printer;
use Mike42\Escpos\EscposImage;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;

class SaleController extends Controller
{


    public function __construct()
    {
       
                $this->middleware('auth'); 
                $this->middleware('can:sales.create')->only(['create', 'store']); 
                $this->middleware('can:sales.index')->only(['index']); 
                $this->middleware('can:sales.show')->only(['show']); 

                $this->middleware('can:change.status.sales')->only(['change_status']); 
                $this->middleware('can:sales.pdf')->only(['pdf']); 
                $this->middleware('can:sales.print')->only(['print']); 
                
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sales = Sale::get();
        return view('admin.sale.index', compact('sales'));
    }

    public function create()
    {   
        $clients = Client::get();
        $products = Product::get();
        
        return view('admin.sale.create', compact('clients', 'products'));

    }

    public function store(StoreRequest $request, Sale $sale)
    {
      
        $sale->my_sale($request); //funcion que se puede manipula desde el modelo
        Alert::toast('Venta realizada con éxito', 'success');
        return redirect()->route('sales.index');
    }

  

 
    public function show(Sale $sale)
    {
        $subtotal = 0 ;
        $saleDetails = $sale->saleDetails;
        foreach ($saleDetails as $saleDetail) {
            $subtotal += $saleDetail->quantity*$saleDetail->price-$saleDetail->quantity* $saleDetail->price*$saleDetail->discount/100;
        }

        return view('admin.sale.show', compact('sale', 'saleDetails', 'subtotal'));

    }

    public function edit(Sale $sale)
    {   
        // $clients = Client::get();
        // return view('admin.sale.show', compact('sale'));
    }

    public function update(UpdateRequest $request, Sale $sale)
    {
       // $purchase->update($request->all());
        //return redirect()->route('purchases.index');
    }

    public function destroy(Sale $sale)
    {
        //$purchase->delete();
        //return redirect()->route('purchases.index');
    }


    public function pdf(Sale $sale)
    {
        $subtotal = 0 ;
        $saleDetails = $sale->saleDetails;
        foreach ($saleDetails as $saleDetail) {
            $subtotal += $saleDetail->quantity*$saleDetail->price-$saleDetail->quantity* $saleDetail->price*$saleDetail->discount/100;
        }

        $pdf = PDF::loadView('admin.sale.pdf', compact('sale', 'saleDetails', 'subtotal'));
        return $pdf->download('Reporte_de_venta'.$sale->id.'.pdf'); 

    }

    public function print(Sale $sale)
    {   
        try {
            $subtotal = 0 ;
            $saleDetails = $sale->saleDetails;
            foreach ($saleDetails as $saleDetail) {
                $subtotal += $saleDetail->quantity*$saleDetail->price-$saleDetail->quantity* $saleDetail->price*$saleDetail->discount/100;
            }

            $printer_name = "TM20";
            $connector = new WindowsPrintConnector($printer_name);
            $printer = new Printer($connector);

            $printer->text("$ 9,500\n");

            $printer->cut();
            $printer->close();

            return redirect()->back();
        } catch (\Throwable $th) {
            return redirect()->back();
        }
       
    }

    public function change_status(Sale $sale)
    {
        if ($sale->status == 'VALID') {
            $sale->update(['status' => 'CANCELED']);
            return redirect()->back();
        } else {
            $sale->update(['status' => 'VALID']);
            return redirect()->back();
        }


    }





}
