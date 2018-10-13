<?php

namespace App\Modles;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    protected $fillable = [
        'image','text','title'
    ];
}
