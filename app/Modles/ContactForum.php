<?php

namespace App\Modles;

use Illuminate\Database\Eloquent\Model;

class ContactForum extends Model
{
    protected $fillable = [
        'name','surname','email','phone','message'
    ];
}
