<?php

namespace App\Models\Basic;

use Illuminate\Database\Eloquent\Model;

class Basic extends Model
{
    protected $table = 'basic';

    protected $fillable = ['name','value'];
}
