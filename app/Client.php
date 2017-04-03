<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{

    protected $fillable = [
        'name',
        'company_name',
        'registration_number',
        'address'
    ];

    public function quotations()
    {
        return $this->hasMany('App\Quotation');
    }
}
