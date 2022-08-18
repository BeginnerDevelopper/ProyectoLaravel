<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BillDetails extends Model
{
    protected $fillable = [
        'bill_id',
        'product_id',
        'quantity',
        'price'
    ];


    public function bill()
    {
        return $this->belongsTo(Sale::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

}
