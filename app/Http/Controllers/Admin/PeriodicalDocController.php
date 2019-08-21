<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Periodical;
use App\Model\PeriodicalDoc;
use Illuminate\Http\Request;

class PeriodicalDocController extends Controller {
	public function index() {
		$periodicals = Periodical::select('id', 'image', 'typestr', 'title', 'cn', 'updated_at', 'status', 'cycle')->where('is_rm', '=', 1)->orderBy('updated_at', 'desc')->paginate(10);
		return view('admin.periodicalDoc.index', compact('periodicals'));
	}

	public function add(Request $request, $id) {
		$periodical = Periodical::select('id', 'image', 'typestr', 'title', 'cn', 'updated_at', 'status')->where('id', '=', $id)->first();
		return view('admin.periodicalDoc.add', compact('periodical', 'id'));
	}

	public function doAdd(Request $request) {
		$data = $request->all();
		$data['code'] = md5($data['year'] . $data['phase'] . $data['periodical_id']);
		$res = PeriodicalDoc::create($data);
		return $res ? '1' : '0';
	}

	public function download(Request $request, $id) {
		$periodical = Periodical::select('title')->where('id', '=', $id)->first();
		$arr = PeriodicalDoc::select('id', 'year', 'phase', 'original', 'note')->where('periodical_id', '=', $id)->orderByDesc('year')->orderBy('phase')->get()->toArray();

		$newArr = [];
		foreach ($arr as $v) {
			$newArr[$v['year']][] = $v;
		}

		return view('admin.periodicalDoc.download', compact('periodical', 'newArr'));
	}

	public function search(Request $request) {
		$key = $request->get('key');
		$periodicals = Periodical::search($key)->paginate(10);
		// $periodicals = Periodical::select('id', 'image', 'typestr', 'title', 'cn', 'updated_at', 'status', 'cycle')->where('title', 'like', "$key%")->orderBy('updated_at', 'desc')->paginate(5);
		return view('admin.periodicalDoc.index', compact('periodicals', 'key'));
	}

	public function read($id) {
		$pc = PeriodicalDoc::select('name')->where('id', '=', $id)->first();
		$url = $pc->getPrivateUrl();
		return view('admin.periodicalDoc.read', compact('url'));
	}

	public function realDownload($id) {
		$pc = PeriodicalDoc::select('name', 'original')->where('id', '=', $id)->first();
		if ($pc) {
			$url = $pc->getPrivateUrl();
			// return $url;
			$filename = $pc->original;
			$handle = fopen($url, 'r');
			if ($handle !== false) {
				set_time_limit(60 * 60);
				header("Content-type: application/octet-stream");
				header("Content-Disposition: attachment; filename=" . $filename);
				while (!feof($handle)) {
					echo fread($handle, 1024 * 1024);
				}
				fclose($handle);
			} else {
				return response('', 204);
			}
		} else {
			return response('', 204);
		}

	}
}
