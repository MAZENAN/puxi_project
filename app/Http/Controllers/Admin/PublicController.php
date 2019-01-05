<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;

class PublicController extends Controller {
	public function login() {
		if (Auth::guard('admin')->check()) {
			return redirect(url('admin/index/index'));
		}
		return view('admin/public/login');
	}

	public function check(Request $request) {
		$this->validate($request, [
			'username' => 'required|min:2|max:20',
			'password' => 'required|min:6',
			'captcha' => 'required|size:5|captcha',
		]);

		$data = $request->only(['username', 'password']);
		$data['status'] = 2;
		$result = Auth::guard('admin')->attempt($data, $request->get('online'));
		if ($result) {
			return redirect(url('admin/index/index'));
		} else {
			return redirect()->back()->withErrors(['用户名或密码错误'])->withInput();
		}
	}

	public function logout() {
		Auth::guard('admin')->logout();
		return redirect(url('admin/public/login'));
	}
}
