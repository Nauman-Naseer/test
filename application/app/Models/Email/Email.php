<?php

namespace App\Models\Email;

use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    protected $table = 'email';
    protected $fillable = ["smtp_host","smtp_user","smtp_password","smtp_port","created_at"];
}
