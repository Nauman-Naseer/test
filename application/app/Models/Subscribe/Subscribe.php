<?php

namespace App\Models\Subscribe;

use Illuminate\Database\Eloquent\Model;

class Subscribe extends Model
{
    protected $table = 'subscribe';

    protected $fillable = ["id","email","status","created_at"];


}
