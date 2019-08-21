<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Model\PeriodicalPaper;
use App\Model\PeriodicalPaperPreview;
use App\Model\PaperCollection;
use Illuminate\Http\Request;
use Auth;

class PaperController extends Controller {
	public function index($id) {
        $paper = PeriodicalPaper::select('title','authors','abstract','id')->where([['code','=',$id],['is_rm','=',1],['status','=',2]])->first();
		if ($paper){
            $paperPreviews = PeriodicalPaperPreview::where('periodical_paper_id',$paper->id)->orderBy('sortid')->pluck('name');
            if (Auth::guard('member')->check()){
                $collectionInfo = ['isLogin'=>true];
                $colPaper = PaperCollection::where([['paper_id','=',$paper->id],['member_id','=',Auth::guard('member')->id()]])->first();
                $collectionInfo['isCollect']= boolval($colPaper);
                if ($colPaper){
                    $collectionInfo['colId']= $colPaper->id;
                }
            }else{
                $collectionInfo = ['isLogin'=>false];
                $collectionInfo['isCollect'] = false;
            }
            return view('home/paper/index',compact('paper','paperPreviews','collectionInfo'));
        }else{
		    return view('errors.404');
        }

	}

	public function catalog(Request $request){
	    $id = $request->get('id');
	    $year = $request->get('year');
	    $phase = $request->get('phase');
       $catalogs =  PeriodicalPaper::select('title','code','authors')->where([['periodical_id','=',$id],['year','=',$year],['phase','=',$phase],['is_rm','=',1],['status','=',2]])->orderBy('sortid')->get();
        if ($catalogs){
            return response()->json(['message'=>'ok','data'=>$catalogs->toJson()]);
        }else{
            return response()->json(['message'=>'no']);
        }
    }

    public function download($id){
        $pc = PeriodicalPaper::select('name')->where('id', '=', $id)->first();
        if ($pc) {
            $ext = substr($pc->name,strrpos($pc->name,'.'));
            $url = $pc->getPrivateUrl();
            // return $url;
            $filename = PeriodicalPaper::where('id',$id)->value('title') .$ext;
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
