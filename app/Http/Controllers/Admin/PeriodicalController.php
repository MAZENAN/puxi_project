<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\DatabaseLevel;
use App\Model\Periodical;
use App\Model\PeriodicalCategory;
use App\Model\PeriodicalDb;
use App\Model\PeriodicalDoc;
use Illuminate\Http\Request;
use App\Model\PeriodicalPaper;

class PeriodicalController extends Controller {
	public function index() {
		$periodicals = Periodical::select('id', 'image', 'typestr', 'title', 'cn', 'updated_at', 'status', 'cycle')->where('is_rm', '=', 1)->orderBy('updated_at', 'desc')->paginate(10);
		return view('admin.periodical.index', compact('periodicals'));
	}

	public function add(Request $request) {
		$levels = DatabaseLevel::get();
		$categorys = PeriodicalCategory::select('typestr', 'name', 'level')->orderby('typestr')->get();
		if ($request->method() == 'POST') {
			$res = Periodical::addData($request->all());
			return $res ? '1' : '0';
		}
		return view('admin.periodical.add', compact('levels', 'categorys'));
	}

	public function edit($id){
        $periodical =  Periodical::find($id);
        $levels = DatabaseLevel::get();
        $dbs = PeriodicalDb::where('periodical_id',$id)->pluck('db_id')->toArray();
        $categorys = PeriodicalCategory::select('typestr', 'name', 'level')->orderby('typestr')->get();
	    return view('admin.periodical.edit',compact('periodical','levels','categorys','dbs'));
    }

    public function detail($id){
        $periodical =  Periodical::find($id);
        $levels = DatabaseLevel::get();
        $dbs = PeriodicalDb::where('periodical_id',$id)->pluck('db_id')->toArray();
        $categorys = PeriodicalCategory::select('typestr', 'name', 'level')->orderby('typestr')->get();
        return view('admin.periodical.detail',compact('periodical','levels','categorys','dbs'));
    }

    public function doEdit(Request $request){
	    $data = $request->all();
	    unset($data['file']);
        $res = Periodical::updateData($data);
        return $res ? '1' : '0';
    }

	public function statusOn($id){
	   $res =  Periodical::where('id','=',$id)->update(['status'=>2]);
	   return $res ? '1':'0';
    }
    public function statusOff($id){
        $res =  Periodical::where('id','=',$id)->update(['status'=>1]);
        return $res ? '1':'0';
    }


    public function delete($id){
	    $paper = PeriodicalPaper::select('id')->where('periodical_id',$id)->first();
	    $doc = PeriodicalDoc::select('id')->where('periodical_id',$id)->first();
	    if ($paper){
	        return response()->json(['code'=>'0','message'=>'该期刊信息下有论文无法删除']);
        }
	    if ($doc){
            return response()->json(['code'=>'0','message'=>'该期刊信息下有文档无法删除']);
        }

	    $res = Periodical::find($id)->delete();
        //TODO ****删除预览图*****
	    if ($res){
	        return response()->json(['code'=>'1','message'=>'期刊信息删除成功']);
        }

	    return response()->json(['code'=>'0','message'=>'期刊信息删除成功']);
    }
}
