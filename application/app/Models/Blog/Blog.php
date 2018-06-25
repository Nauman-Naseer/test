<?php

namespace App\Models\Blog;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $table = 'blog';

    protected $fillable = ["title","image","video","position_id","category_id","blog","user_id"];

     //this method name has to be model name
    public function user(){
        return $this->hasOne('App\User');
    }

}
