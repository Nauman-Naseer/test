<?php

namespace App\Models\Category;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category';

    protected $fillable = ["category","cat_ad","cat_side"];
	
	public function blog()
    {
        return $this->hasMany('App\Models\Blog\Blog');
    }

}
