<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Signed extends Model
{
    protected   $fillable = ([
        'url',
        'user_id',
        'contract_id'
    ]);

    public function contract()
    {
        return $this->belongsTo(Contract::class);
    }
}
