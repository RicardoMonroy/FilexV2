<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $fillable = [
        'name', 'file', 'user_id',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function contracts(){
        return $this->hasMany(Contract::class);
    }
}
