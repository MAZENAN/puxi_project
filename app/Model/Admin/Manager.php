<?php

namespace App\Model\Admin;

use App\Model\Admin\Role;
use Illuminate\Auth\Authenticatable as TraitAu;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Manager extends Model implements Authenticatable {
	protected $table = 'manager';

	public $fillable = ['username', 'password', 'gender', 'mobile', 'email', 'role_id', 'status'];

	use TraitAu;

	public function statusToStr() {
		switch ($this->status) {
		case 1:
			return '已停用';
			break;
		case 2:
			return '已启用';
			break;
		}
	}

	public function role() {
		return $this->belongsTo(Role::class, 'role_id', 'id');
	}
}