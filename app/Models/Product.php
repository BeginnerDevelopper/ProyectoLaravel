<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\SoftDeletes;


class Product extends Model
{
    use SoftDeletes;
    protected $fillable =[
        'code',
        'name' ,       
        'stock',
        'image',
        'sell_price',
        'status',
        'category_id',
        'provider_id',
    ];

    public function add_stock($quantity)
    {
        $this->increment("stock", $quantity); //+ suma una cantidad
    }
    
    public function subtract_stock($quantity)
    {

       // DB::table('products')->decrement('stock', $quantity);
        $this->decrement("stock", $quantity); //-resta una cantida de una tabla en especifico
        // Modo con update
        // $this->update([
        //     'stock' => DB::raw("stock + $quantity"),
        // ]);
       
    }


    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function provider()
    {
        return $this->belongsTo(Provider::class);
    }

  

}
