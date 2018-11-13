<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    public $timestamps = false;
    protected $table = 'business';
    protected $fillable = [
        'uid', 'pid','title', 'description'
    ];
}
