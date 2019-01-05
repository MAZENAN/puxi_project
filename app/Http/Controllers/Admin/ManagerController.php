<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Admin\Manager;

class ManagerController extends Controller {
	public function index() {
		// $data = Manager::all();
		$data = Manager::paginate(5);
		return view('admin/manager/index', compact('data'));
	}
}
