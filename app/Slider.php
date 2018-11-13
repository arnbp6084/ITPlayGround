<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    public $timestamps = false;
    protected $table = 'slider';
    protected $fillable = [
        'pid', 'title', 'text1', 'text2', 'image', 'status'
    ];
}
