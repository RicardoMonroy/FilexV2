<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Handwritten extends Model
{
    protected $fillable = ([
        'user_id',
        'path',
        'base64'
    ]);

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
