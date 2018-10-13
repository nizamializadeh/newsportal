<?php

namespace App\Modles;

use Illuminate\Database\Eloquent\Model;

class Main extends Model
{
    protected $fillable = [
        'logo','singe_page_img','site_desc','site_title','site_share_img'
    ];
}
