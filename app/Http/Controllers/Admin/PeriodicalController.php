<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Admin\DatabaseLevel;
use App\Model\Admin\PeriodicalCategory;
use Illuminate\Http\Request;

class PeriodicalController extends Controller {
	public function index() {
		$pinyin = app('pinyin');
		echo substr($pinyin->sentence('<<医学期刊'), 0, 1);

		return view('admin.periodical.index');
	}

	public function add(Request $request) {
		$levels = DatabaseLevel::get();
		$categorys = PeriodicalCategory::select('typestr', 'name', 'level')->orderby('typestr')->get();
		if ($request->method == 'POST') {

		}

		return view('admin.periodical.add', compact('levels', 'categorys'));
	}
}
