<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PeriodicalDb extends Model {
	public $table = 'periodical_db';
	public $fillable = ['periodical_id', 'db_id'];
	public $timestamps = false;
}
