<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Periodical;
use App\Model\PeriodicalPaper;
use App\Model\PeriodicalPaperPreview;
use DB;
use Illuminate\Http\Request;

class PeriodicalPaperController extends Controller {
	public function index() {
		$periodicals = Periodical::select('id', 'image', 'typestr', 'title', 'cn', 'updated_at', 'status', 'cycle')->where('is_rm', '=', 1)->orderBy('updated_at', 'desc')->paginate(5);
		return view('admin.periodicalPaper.index', compact('periodicals'));
	}

	public function add($id) {
		return view('admin/periodicalPaper.add', compact('id'));
	}

	public function doAdd(Request $request) {
		$data = $request->all();
		$data['doi'] = $data['doi'] ? $data['doi'] : null;
		$data['code'] = md5($data['periodical_id'] . $data['year'] . $data['phase'] . $data['sortid']);
		//$res = PeriodicalPaper::create($data);
		//return $res ? '1' : '0';

        DB::beginTransaction();
        try {
            $res1 = PeriodicalPaper::create($data);
            if (!$res1){
                throw new \Exception("1");
            }
            foreach ($data['previews'] as $preview) {
                $name = substr(strstr($preview,'_'),1);
                $sortid = strstr($preview,'_',true);
                $res = PeriodicalPaperPreview::create(['name'=>$name,'sortid'=>$sortid,'periodical_paper_id'=>$res1->id]);
                if (!$res){
                throw new \Exception("2");
                }
            }
            DB::commit();
            return '1';
        } catch (\Exception $e)
        {
            DB::rollback();
            return '0';
        }
	}

	public function phase($id) {
		$periodical = Periodical::select('title')->where('id', '=', $id)->first();
		$arr = PeriodicalPaper::select('year', 'phase')->where('periodical_id', '=', $id)->orderByDesc('year')->orderBy('phase')->distinct()->get()->toArray();

		$newArr = [];
		foreach ($arr as $v) {
			$newArr[$v['year']][] = $v;
		}
		return view('admin.periodicalPaper.phase', compact('periodical', 'newArr', 'id'));
	}
}
