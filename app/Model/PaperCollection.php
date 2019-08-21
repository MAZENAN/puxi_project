<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PaperCollection extends Model
{
    public $table = 'collection_paper';
    public $fillable = ['member_id','paper_id'];
    public $timestamps = false;
}
