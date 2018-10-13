<?php

namespace App\Modles;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = [
        'photo','post_id'
    ];
    public function post(){
        return $this->belongsTo('App\Modles\Post');
    }
}
