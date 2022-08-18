<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $fillable = [

    'client_id',
    'user_id',
    'bill_date',
    'tax',
    'neto',
    'total',
    'status'

    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function billDetails()
    {
        return $this->hasMany(BillDetails::class);
    }

  
}
