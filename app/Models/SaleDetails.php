<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SaleDetails extends Model
{
    protected $fillable = [
        'sale_id',
        'product_id',
        'quantity',
        'price',
        'discount',
    ];


    public function sale()
    {
        return $this->belongsTo(Sale::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class)->withTrashed();
    }
}
