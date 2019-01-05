<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Auth extends Model {
	public $table = 'auth';
	public $timestamps = false;
	public $fillable = ['auth_name', 'controller', 'action', 'pid', 'is_nav'];

	public function isNav() {
		switch ($this->is_nav) {
		case 1:
			return '是菜单';
			break;
		case 2:
			return '不是菜单';
			break;
		}
	}
}
