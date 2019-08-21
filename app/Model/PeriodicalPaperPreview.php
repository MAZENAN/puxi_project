<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PeriodicalPaperPreview extends Model {
	public $table = 'periodical_paper_preview';
	public $timestamps = false;
	public $fillable = ['name', 'sortid', 'periodical_paper_id'];
}
