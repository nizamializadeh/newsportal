<?php

namespace App\Modles;

use Illuminate\Database\Eloquent\Model;

class Testimonail extends Model
{
    protected $fillable = [
        'name','image','company','message'
    ];
}
