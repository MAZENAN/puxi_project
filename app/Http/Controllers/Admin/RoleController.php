<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Auth;
use App\Model\Role;
use Illuminate\Http\Request;

class RoleController extends Controller {
	public function index() {
		$roles = Role::all();
		return view('admin.role.index', compact('roles'));
	}

	public function assign(Request $request) {
		if (request()->method() == 'POST') {
			$res = Role::authSave($request);

			return $res ? 1 : 0;
		} else {
			//查询一级权限
			$top = Auth::where('pid', '0')->get();
			//查询二级权限
			$cat = Auth::where('pid', '!=', '0')->get();
			//获取当前角色具备的权限id集合
			$ids = Role::where('id', request('id'))->value('auth_ids');
			//展示视图
			return view('admin.role.assign', compact('top', 'cat', 'ids'));
		}}

	public function add(Request $request) {
	    if ($request->isMethod('post')){
	        $res = Role::create($request->all());
	        return $res ? '1' : '0';
        }
		return view('admin.role.add');
	}

	public function edit() {
		return view('admin.role.edit');
	}
}
