<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class Purchase extends Model
{
    protected $fillable = [
        'provider_id',
        'user_id',
        'purchase_date',
        'tax',
        'total',
        'status',
        'picture',

    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function provider()
    {
        return $this->belongsTo(Provider::class);
    }

    public function purchaseDetails()
    {
        return $this->HasMany(PurchaseDetails::class);
    }

    public function update_stock($id, $quantity)
    {
        $product = Product::find($id);
        $product->add_stock($quantity);

    }

    //funcion del controlador Purchase
    public function my_store($request)
    {

        $purchase = Purchase::create($request->all() + [
            'user_id' => Auth::user()->id,
            'purchase_date' => Carbon::now('America/Lima'),
            //'code' => $request->get('code'),
            
            
        ]);
        // $purchase->update_stock();
        $purchase->add_purchase_details($request);
       
    }

     public function add_purchase_details($request)
     {
        foreach ($request->product_id as $key => $id) {
            
            $this->update_stock($request->product_id[$key], $request->quantity[$key]);
            $arr = explode('_',$request->product_id[$key]);
             //explode funciona para separar argumentos o parametros de tipo string en un arreglo. por ejemplo explode ("-", "2022-19-01")

            //dd($arr[0]);
            //$request->product_id[$key]
            $results[] = array(
                "product_id" => $arr[0],
                "quantity" => $request->quantity[$key], "price" => $request->price[$key]
           );
        }
        //dd($results);
        $this->purchaseDetails()->createMany($results);
    }

   

}
