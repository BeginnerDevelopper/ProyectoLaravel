<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use ESolution\DBEncryption\Traits\EncryptedAttribute;

class Client extends Model
{
    use EncryptedAttribute;

    protected $encryptable = [
        'dni',
        'email',

    ];

    protected $fillable =[
        'name', 
        'dni',
        'nit',
        'address',
        'phone',
        'email',
    ];


}
