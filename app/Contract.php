<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    protected $fillable = ([
        'name',
        'message',
        'file_id',
        'user_id',
        'user_name'
    ]);

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function file()
    {
        return $this->belongsTo(File::class);
    }

    public function users(){
        return $this->belongsToMany(User::class);
    }

    public function signatures(){
        return $this->hasMany(Signature::class);
    }

    public function signed(){
        return $this->hasOne(Signed::class);
    }
}
