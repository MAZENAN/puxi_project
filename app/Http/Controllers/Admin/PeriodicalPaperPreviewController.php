<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Periodical;
use App\Model\PeriodicalPaper;
use Illuminate\Http\Request;

class PeriodicalPaperPreviewController extends Controller {
	public function index() {
		$periodicals = Periodical::select('id', 'image', 'typestr', 'title', 'cn', 'updated_at', 'status', 'cycle')->where('is_rm', '=', 1)->orderBy('updated_at', 'desc')->paginate(5);
		return view('admin.PeriodicalPaperPreview.index', compact('periodicals'));
	}

	public function phase($id) {
		$periodical = Periodical::select('title')->where('id', '=', $id)->first();
		$arr = PeriodicalPaper::select('year', 'phase')->where('periodical_id', '=', $id)->orderByDesc('year')->orderBy('phase')->distinct()->get()->toArray();

		$newArr = [];
		foreach ($arr as $v) {
			$newArr[$v['year']][] = $v;
		}
		return view('admin.PeriodicalPaperPreview.phase', compact('periodical', 'newArr', 'id'));
	}

	public function catalog($id, $year, $phase) {
		$arr = PeriodicalPaper::select('id', 'platename', 'title', 'authors', 'source')->where('periodical_id', '=', $id)->where('year', '=', $year)->where('phase', '=', $phase)->orderBy('platename')->orderBy('sortid')->get()->toArray();

		$newArr = [];
		foreach ($arr as $v) {
			$key = $v['platename'];
			if (empty($key)) {
				$key = '无板块';
			}
			$newArr[$key][] = $v;
		}

		return view('admin.PeriodicalPaperPreview.catalog', compact('newArr'));
	}

	public function add(Request $request) {

	}
}
