<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Role extends Model {
	public $table = 'role';
	public $timestamps = false;
	public $fillable = ['role_name', 'auth_ids', 'auth_ac'];

	public static function authSave($request) {
		$auth_ids = $request->get('auth_id');
		$id = $request->get('id');
		$auth_ac = '';
		if (!$auth_ids) {
			$res = self::where('id', '=', $id)->update(['auth_ids' => '', 'auth_ac' => '']);
			return $res;
		}
		$acArr = [];
		foreach ($auth_ids as $value) {
			$auth = Auth::select(DB::raw('CONCAT_WS("@",controller,action) as ac'))->where('id', '=', $value)->first();
			if ($auth) {
				$auth->ac ? $acArr[] = $auth->ac : '';
			}
		}
		$auth_ids = implode(',', $auth_ids);
		$auth_ac = implode(',', $acArr);
		$res = self::where('id', '=', $id)->update(['auth_ids' => $auth_ids, 'auth_ac' => $auth_ac]);
		return $res;
	}
}
