<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Admin\Auth;
use Illuminate\Http\Request;

class AuthController extends Controller {
	public function index() {
		$auths = Auth::from('auth as auth1')->select('auth1.*', 'auth2.auth_name as parent_name')->leftJoin('auth as auth2', 'auth1.pid', '=', 'auth2.id')->get();
		return view('admin.auth.index', compact('auths'));
	}

	public function add() {
		if (request()->method() == 'POST') {
			$result = Auth::create(request()->all());
			return $result ? 1 : 0;
		}
		$auths = Auth::select('id', 'auth_name')->where('pid', '=', 0)->get();
		return view('admin.auth.add', compact('auths'));
	}
}
