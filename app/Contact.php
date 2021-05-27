<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = ([
        'paragraph',
        'address',
        'addressPhone',
        'addressMovil',
        'emailSupport',
        'emailSales',
        'emailContact'
    ]);

    public function guests()
    {
        return $this->hasMany('Guest::class');
    }
}
