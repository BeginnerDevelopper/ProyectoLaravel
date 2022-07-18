<?php

namespace App\Http\Controllers;

use App\Sale;
use App\Client;
use Illuminate\Http\Request;
use App\Http\Requests\Sale\StoreRequest;
use App\Http\Requests\Sale\UpdateRequest;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sales = Sale::get();
        return view('sales.index', compact('sales'));
    }

    public function create()
    {   
        $clients = Client::get();
        return view('admin.client.create', compact('clients'));

    }

    public function store(StoreRequest $request)
    {
        $sale = Sale::create($request->all());
        foreach ($request->product_id as $key => $product ) {
            
            $results[] = array("product_id" => $request->product_id[$key], 
            "quantity"=>$request->quantity[$key], "price"=>$request->price[$key],
            "discount"=>$request->discount[$key]);
        }
        $sale->saleDetails()->createMany($results);

        return redirect()->route('purchases.index');
    }

 
    public function show(Sale $sale)
    {
        return view('admin.sale.show', compact('sale'));
    }

    public function edit(Sale $sale)
    {   
        $clients = Client::get();
        return view('admin.sale.show', compact('sale'));
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

}
