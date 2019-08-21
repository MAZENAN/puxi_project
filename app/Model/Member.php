<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable as TraitAu;
use Illuminate\Contracts\Auth\Authenticatable;
class Member extends Model implements Authenticatable{
    use TraitAu;
	public $table = 'member';

	public $fillable = ['username','password','avator','phone','gender','status'];

	public function papers(){
	    return $this->belongsToMany('App\Model\PeriodicalPaper','collection_paper','member_id','paper_id');
    }
}


