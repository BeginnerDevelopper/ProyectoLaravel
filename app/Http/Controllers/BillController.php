<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bill;
use App\Models\Client;
use App\Models\Product;
use App\Http\Requests\Bill\StoreRequest;
use App\Http\Requests\Bill\UpdateRequest;
use PDF;
use RealRashid\SweetAlert\Facades\Alert;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

use Mike42\Escpos\PrinterConnectors\FilePrintConnextor;
use Mike42\Escpos\Printer;
use Mike42\Escpos\EscposImage;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;

class BillController extends Controller
{

    public function __construct()
    {
        //evita que se pueda acceder a las rutas sin estar logueado
        $this->middleware('auth');
        
                $this->middleware('can:bills.create')->only(['create', 'store']); 
                $this->middleware('can:bills.index')->only(['index']); 
                $this->middleware('can:bills.show')->only(['show']); 

                $this->middleware('can:change.status.sales')->only(['change_status']); 
                $this->middleware('can:bills.pdf')->only(['pdf']); 
                $this->middleware('can:bills.print')->only(['print']); 
    }

    public function index()
    {
        $bills = Bill::get();
        return view('admin.bill.index', compact('bills'));
    }

    public function create()
    {
    
        $clients = Client::get();
        $products = Product::get();
        return view('admin.bill.create', compact('clients', 'products'));

    }

    public function store(StoreRequest $request, Bill $bill)
    {
       // dd($request->all());
        //almacena los datos en Billdetails
        
        $bill = Bill::create($request->all()+[
            'user_id'=>Auth::user()->id, 
            'bill_date'=>Carbon::now('America/Lima'), 
        ]);
        //return redirect()->route('bills.index');
            foreach($request->product_id as $key => $product){

                $arr = explode('_',$request->product_id[$key]);

                $results[] = array(
                    "product_id" => $arr[0], 
                    "quantity" => $request->quantity[$key],"price" => $request->price[$key]);
            }
            $bill->billDetails()->createMany($results);
            Alert::toast('Factura realizada con éxito', 'success');
            return redirect()->route('bills.index');
    }


    public function show(Bill $bill)
    {
        $subtotal = 0;
        //$billDetails = $bill->billDetails;
        $billDetails = $bill->billDetails;
        foreach ($billDetails as $billDetail) {
            $subtotal += $billDetail->quantity * $billDetail->price - $billDetail->quantity* $billDetail->price*$billDetail->discount/100 ;
        }
        return view('admin.bill.show', compact('bill', 'billDetails', 'subtotal'));
    }

    // public function edit(Bill $bill)
    // {
    //     $clients = Client::get();
    //     return view('admin.bill.edit', compact('bill'));
    // }

    public function update(UpdateRequest $request, Bill $bill)
    {
        $bill->update($request->all());
        return redirect()->route('bills.index');
    }

    public function destroy(Bill $bill)
    {
        $bill->delete();
        return redirect()->route('bills.index');
    }

    public function pdf(Bill $bill)
    {
        $subtotal = 0;
        $billDetails = $bill->billDetails;
        foreach ($billDetails as $billDetail) {
            $subtotal += $billDetail->quantity * $billDetail->price - 
            $billDetail->quantity* $billDetail->price*$billDetail->discount/100;
        }
        $pdf = PDF::loadView('admin.bill.pdf', compact('bill', 'subtotal', 'billDetails'));
        return $pdf->download('Resumen_de_factura_' . $bill->id . '.pdf');
    }

    public function print(Bill $bill)
    {   
        try {
            $subtotal = 0 ;
            $billDetails = $bill->billDetails;
            foreach ($billDetails as $billDetail) {
                $subtotal += $billDetail->quantity*$billDetail->price-$billDetail->quantity* $billDetail->price*$billDetail->discount/100;
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









    public function upload(Request $request, Bill $bill)
    {
        // $bill->update($request->all());
        //return redirect()->route('purchases.index');
    }

    // public function change_status(Bill $bill)
    // {
    //     if ($bill->status == 'VALID') {
    //         $bill->update(['status' => 'CANCELED']);
    //         return redirect()->back();
    //     } else {
    //         $bill->update(['status' => 'VALID']);
    //         return redirect()->back();
    //     }


    }


