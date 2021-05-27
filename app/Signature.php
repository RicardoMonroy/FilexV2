<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Signature extends Model
{
    protected $fillable = ([
        'user_id',
        'contract_id',
        'verify',
        'string',
        'rfc',
        'legalName',
        'branchName',
        'serialNumber'
    ]);

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function contract()
    {
        return $this->belongsTo(Contract::class);
    }
}
