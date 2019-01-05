<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Admin\PeriodicalCategory;
use Illuminate\Http\Request;

class PeriodicalCategoryController extends Controller {
	public function index() {
		$categorys = PeriodicalCategory::paginate(5);
		return view('admin.periodicalCategory.index', compact('categorys'));
	}

	public function add(Request $request) {
		if ($request->method() == 'POST') {

			$res = PeriodicalCategory::addData($request->all());
			return $res ? '1' : '0';
		}
		// $categorys = PeriodicalCategory::getTree();
		$categorys = PeriodicalCategory::select('id', 'name', 'level')->orderby('typestr')->get();
		return view('admin.periodicalCategory.add', compact('categorys'));
	}

	public function edit(Request $request) {
		if ($request->method() == 'POST') {
			$res = PeriodicalCategory::update($request->all());

			return $res ? '1' : '0';
		}
		$categorys = PeriodicalCategory::getTree();
		return view('admin.periodicalCategory.edit', compact('categorys'));

	}
}
