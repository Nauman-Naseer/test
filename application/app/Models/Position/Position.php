<?php

namespace App\Models\Position;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    protected $table = 'position';

    protected $fillable = ["position"];
	
	public function position()
    {
        return $this->hasMany('App\Models\Blog\Blog');
    }

}
