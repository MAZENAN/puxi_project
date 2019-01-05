<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Periodical extends Model {
	public $table = 'periodical';

	public $fillable = [
		'title',
		'first_letter',
		'description',
		'image',
		'foreign_title',
		'issn',
		'cn',
		'viewed',
		'download',
		'lang',
		'created_at',
		'updated_at',
		'establish_at',
		'cycle',
		'status',
		'is_rm',
		'mobile',
		'email',
		'postal_code',
		'price_info',
		'typestr',
		'competent_unit',
		'sponsor_unit',
		'editorial_unit',
	];
}
