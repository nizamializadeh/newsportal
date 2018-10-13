<?php

namespace App\Modles;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
        'text','phone','map','email','adress'
    ];
}
