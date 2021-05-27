<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $fillable = ([
        'name',
        'about_id'
    ]);

    public function about()
    {
        return $this->belongsTo(About::class);
    }
}
