<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = 
    ['name', 'description'];
    
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    /*<---PRUEBAS UNITARIAS -->*/

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = strtolower($value);
        $this->attributes['description'] = strtolower($value);
    }

}
