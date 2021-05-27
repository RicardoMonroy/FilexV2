<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    protected $fillable = ([
        'title',
        'subtitleLeft',
        'subtitleRight',
        'paragraph',
        'picture'
    ]);

    public function documents()
    {
        return $this->hasMany(Document::class);
    }

    public function characteristics()
    {
        return $this->hasMany(Characteristic::class);
    }
}
