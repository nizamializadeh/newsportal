<?php

namespace App\Modles;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name','parent_id','status'
    ];
    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }
}
