<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quotation extends Model
{
       protected $fillable = [
        'client_id',
        'quotation_id',
        'item',
        'subject',
        'description',
        'cost',
        'quantity',
        'created_at'
    ];

    public function client()
    {
        return $this->hasOne('App\Client');
    }
}
