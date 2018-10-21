<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    public $timestamps = false;
    protected $table='contactus';
    protected $fillable = [
        'uid', 'title','message'
    ];

    public function users()
    {
        return $this->belongsTo('App\User','uid');
    }
}
