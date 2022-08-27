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

    public function my_store($request)
    {
        $purchase = Purchase::create($request->all() + [
            'user_id' => Auth::user()->id,
            'purchase_date' => Carbon::now('America/Lima'),
        ]);
       // $purchase->update_stock();
        $purchase->add_purchase_details($request);
       
    }

    public function add_purchase_details($request)
    {
        foreach ($request->product_id as $key => $id) {
            
            $this->update_stock($request->product_id[$key], $request->quantity[$key]);

            $results[] = array(
                "product_id" => $request->product_id[$key],
                "quantity" => $request->quantity[$key], "price" => $request->price[$key]
            );
        }
        $this->purchaseDetails()->createMany($results);
    }

}
