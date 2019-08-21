<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    public $table = 'site';
    public $fillable = ['site_name','site_desc','site_keywords','copyright','record_number','phone','wechat','qq','address'];
}
