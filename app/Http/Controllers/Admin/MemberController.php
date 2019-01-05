<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MemberController extends Controller {
	public function index(Request $request) {
		return view('admin.member.index');
	}

	public function add(Request $request) {
		return view('admin.member.add');
	}
}
