<?php

namespace App\Exports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;


class ProductExport implements FromCollection,WithHeadings
{
  
    public function headings():array{

        return
        [
        'id',
        'code',
        'name', 
        'stock',
        'image',
        'sell_price',
        'status',
                 
           
        ];
    }

    public function collection()
    {
        return Product::all();
        //return Product::select("code", "name", "stock", "image", "sell_price", "status")->get();
    }
}
