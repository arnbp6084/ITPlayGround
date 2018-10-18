<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
	public $timestamps = false;
    protected $fillable = [
        'name', 'description', 'images', 'status'
    ];

    public function users()
    {
        return $this->belongsToMany('App\User','user_project','pid','uid');
    }
}
